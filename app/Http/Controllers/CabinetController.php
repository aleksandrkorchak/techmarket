<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Events\MentionCreated;
use App\Events\OfferAccepted;
use App\Events\OfferCreated;
use App\Http\Requests\AcceptOfferRequest;
use App\Http\Requests\AddOfferRequest;
use App\Http\Requests\GetSearchInfoRequest;
use App\Http\Requests\Admin\UpdateSearchRequest;
use App\mention;
use App\Offer;
use App\Quality;
use App\Search;
use App\Seller;
use App\State;
use App\User;
use App\View;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use App\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreDataProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Occupation;
use App\Device;

use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use UploadImage;
//use Dan\UploadImage\UploadImage;
use Dan\UploadImage\Exceptions\UploadImageException;

class CabinetController extends Controller
{
    /**
     * Отобразить форму профиля пользователя (покупателя, продавца, админа)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function showProfile()
//    {
//        $user = Auth::user();
//
//        //Список возможных родов деятельности: "Продавец", "Сервис"
//        $occupations = Occupation::pluck('name', 'id');
//
//        //Список возможных категорий деятельности: "Планшеты", "Смартфоны" и т.д.
//        $devices = Device::pluck('category', 'id');
//
//        //Время с момента создания пользователя
//        $user_time_create = Carbon::parse($user->created_at);
//        $time_after_create_user = $user_time_create->diffForHumans(null,
//            CarbonInterface::DIFF_RELATIVE_TO_NOW, false, 2);
//
//        return view('cabinet.profile',
//            ['user' => $user, 'occupations' => $occupations, 'devices' => $devices, 'interval' => $time_after_create_user]);
//    }

    public function showProfileById(Request $request)
    {


        $user = User::findOrFail($request->user_id);

        //Список возможных родов деятельности: "Продавец", "Сервис"
        $occupations = Occupation::pluck('name', 'id');

        //Список возможных категорий деятельности: "Планшеты", "Смартфоны" и т.д.
        $devices = Device::pluck('category', 'id');

        //Время с момента создания пользователя
        $user_time_create = Carbon::parse($user->created_at);
        $time_after_create_user = $user_time_create->diffForHumans(null,
            CarbonInterface::DIFF_RELATIVE_TO_NOW, false, 2);
        $interval = $time_after_create_user;


        if ($user->id == Auth::id()) {
            if ($user->role_id == 1) {
                return view('cabinet.profile.owner',
                    ['user' => $user, 'occupations' => $occupations, 'devices' => $devices, 'interval' => $time_after_create_user]);
            }

            $offers = $user->offers()->whereNotNull('mention_id')->get();
            $mentions = [];
            //TODO: Как-то кривовато: сначала получаем первый отзыв (корень), а потом его детей отдельно
            foreach ($offers as $key => $offer) {
//                $offer->load('mention');
                //$offer->me
//                dd($offer);
                $tree = Mention::getTreeWhere('id', $offer->mention_id);
                foreach ($tree as $element) {
                    $element->load('sender');
                }
                $mentions[$key] = $tree;
            }
//            dd($mentions);

            return view('cabinet.profile.owner',
                compact('user', 'occupations', 'devices', 'interval', 'offers', 'mentions'));
        }

        if (Auth::user()->role_id == 3) {
//            dd('admin');
            return view('cabinet.profile.admin',
                ['user' => $user, 'occupations' => $occupations, 'devices' => $devices, 'interval' => $time_after_create_user]);
        }


    }


    public function saveProfile(StoreDataProfile $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->login = $request->login;
        if (isset($request->new_pass)) {
            $user->password = Hash::make($request->new_pass);
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;


        if ($user->role_id == 2 || $user->role_id == 3) {
            $user->seller->organization = $request->organization;
            $user->seller->occupation_id = $request->occupation;

            $user->seller->devices()->sync($request->devices);

            $user->seller->save();
        }

        //Если выбрано новое фото пользователя
        $file = $request->file('photo');
        if (isset($file)) {

            //delete old photo and its thumbnails
            UploadImage::delete($user->photo, 'user', '42');

            // Upload and save image.
            try {
                // Upload and save image.
                $img_filename = UploadImage::upload($file, 'user', false, false, true, [42, 42])->getImageName();
                $user->photo = $img_filename;
            } catch (UploadImageException $e) {

                return back()->withInput()->withErrors(['image', $e->getMessage()]);
            }
        }

        $user->save();

        return redirect()->route('show.profile', ['user_id' => Auth::id()]);
    }


    public function showSearches(Request $request)
    {
        $user = Auth::user();

        if ($request->menu_search_type == 'personal') {
            $searches = $user->searches()->with(['user', 'model', 'spare', 'offers'])->paginate(5);
            $view_name = 'cabinet.searches_personal';
        } elseif ($request->menu_search_type == 'all') {
            $searches = Search::where('user_id', '<>', $user->id)->with(['user', 'model', 'spare', 'offers'])->paginate(5);
            $view_name = 'cabinet.searches_all';
        } else {
            return view('index');
        }

        //Время с момента создания запроса
        foreach ($searches as $search) {
            $search_time_create = Carbon::parse($search->created_at);
            $time_after_create_search[] = $search_time_create->diffForHumans(null,
                CarbonInterface::DIFF_RELATIVE_TO_NOW, false, 2);
        }


        return view($view_name, compact('searches', 'time_after_create_search'));

    }


    //TODO: Перепроверить контроллеры и использовать по возможности функцию findOrFail
    //Модернизированный поиск по идентификатору
    public function showSearchInfoById(GetSearchInfoRequest $request)
    {
        //Get search or fail
        try {
            $search = Search::with(['user', 'model', 'spare'])->findOrFail($request->search_id);
        } catch (ModelNotFoundException $ex) {
            return back();
        }


        //Отформатированное время с момента создания запроса
        $search_time_create = Carbon::parse($search->created_at);
        $time_after_create_search = $search_time_create->diffForHumans(null,
            CarbonInterface::DIFF_RELATIVE_TO_NOW, false, 2);

        //Views
        //TODO: Изменить способ подсчета просмотров, слишком много запросов
        $views_count = View::where('search_id', $search->id)->count();

        //Offers
        //Params for next sort links
        $next_sort_params = [
            'price' => 'asc-price',
            'rating' => 'asc-rating'
        ];
//        dd($request->sort);
        //If the sort param exists and the user owns the search or the user is admin
        if (isset($request->sort) && (Auth::id() === $search->user_id || Auth::user()->role_id === 3)) {

            switch ($request->sort) {
                case 'asc-price':
                    $column = 'price';
                    $direction = 'asc';
                    $next_sort_params['price'] = 'desc-price';
                    break;
                case 'desc-price':
                    $column = 'price';
                    $direction = 'desc';
                    $next_sort_params['price'] = 'asc-price';
                    break;
                case 'asc-rating':
                    $column = 'rating';
                    $direction = 'asc';
                    $next_sort_params['rating'] = 'desc-rating';
                    break;
                case 'desc-rating':
                    $column = 'rating';
                    $direction = 'desc';
                    $next_sort_params['rating'] = 'asc-rating';
                    break;
                default:
                    $column = 'price';
                    $direction = 'asc';
                    break;
            }
            $offers = Offer::with('user', 'state', 'quality')->where('search_id', $search->id)->orderBy($column, $direction)->get();
//            dump($offers);
//            dd($next_sort_params);
        } else {
            $offers = Offer::with('user', 'state', 'quality')->where('search_id', $search->id)->get();
        }
        $offers_count = $offers->count();

//        $messages = [];
        $user = Auth::user();
        if (isset($offers_count)) {
            foreach ($offers as $offer) {
                if ($user->id === $offer->seller_id || $user->id === $search->user_id || $user->role_id === 3) {

                    $offer->load('messages');

                }
            }
        }

//        dd($offers);

        //Messages for offers
//        if (empty($offers_count)) {
//            $messages = [];
//        } else {
//            $list_offers_id = $offers->pluck('id')->all();
//            $messages = Message::whereIn('offer_id', $list_offers_id)->get();
//        }

        //States list
        $states = State::all();

        //Qualities list
        $qualities = Quality::all();


        //Select view
        if ($search->user_id == Auth::user()->id) {
            if ($request->route()->getName() == 'show.edit.search') {
                $view_name = 'cabinet.edit_search_info_for_personal';
            } else {
                $view_name = 'cabinet.search_info_for_personal';
            }
        } else {
            if ($request->route()->getName() == 'show.edit.search') {
                $view_name = 'cabinet.edit_search_info_for_all';
            } else {
                $view_name = 'cabinet.search_info_for_all';
            }
        }

//        $user = Auth::user();
//        dd($user->offers);
//        dd($user->offers()->where('search_id', $search->id)->count());
//        dd($search->offers()->where('seller_id', $user->id)->get());


        return view($view_name,
            compact('search',
                'time_after_create_search',
                'views_count',
                'states',
                'qualities',
                'offers',
                'next_sort_params'
            /*'messages'*/));

    }


    public function storeSearch(UpdateSearchRequest $request)
    {

        $comment = remove_foreign_uri($request->comment);

        try {
            $search = Search::findOrFail($request->search_id);
        } catch (ModelNotFoundException $ex) {
            return back();
        }

        $user = Auth::user();

        if ($user->id == $search->user_id || $user->role_id == 3) {
            $search->comment = $comment;
            $search->save();
        }

        return back();
    }





    //TODO: Проверить имеет ли право пользователь удалять заявку
    // и проверить входные параметры
    public function deleteSearch(Request $request)
    {
//        dd($request->search_id);
        try {
            $search = Search::findOrFail($request->search_id);
        } catch (ModelNotFoundException $ex) {
            return back();
        }

        $user = Auth::user();

//        dump($search);
//        dd($user);

        if ($user->id == $search->user_id || $user->role_id == 3) {
//            dd('User can delete search');
            Search::destroy($search->id);
        } else {
//            dd('User can not delete search');
        }

        return back();
    }


    //TODO: check input data
    public function addOffer(AddOfferRequest $request)
    {
//        dump($request->all());
//        dump($request->input());
//        dd($request->id);

        $offer = new Offer();
        $offer->seller_id = Auth::user()->id;
        $offer->search_id = $request->search_id;
        $offer->photo = $request->photo;
        $offer->price = $request->price;
        $offer->state_id = $request->state_id;
        $offer->quality_id = $request->quality_id;
        $offer->comment = remove_foreign_uri($request->comment);


        //Save the image for current offer
        $image_file = $request->file('photo');
//        dd($request->all());
//        dd($image_file);
        if (isset($image_file)) {

            //delete old photo and its thumbnails
//            UploadImage::delete($user->photo, 'user', '42');

            // Upload and save image.
            try {
                // Upload and save image.
                $img_filename = UploadImage::upload($image_file, 'offer', false, false, true, [42, 42])->getImageName();
//                dd($img_filename);
                $offer->photo = $img_filename;

            } catch (UploadImageException $e) {

                return back()->withInput()->withErrors(['image', $e->getMessage()]);
            }
        }

        //TODO: Проверить записалось ли предложение
        $offer->save();
        event(new OfferCreated($offer));


        return back();
    }


    public function showMessages()
    {
        return view('layouts.messages');
    }


    //TODO: Проверить входные данные
    public function addMessageForOffer(Request $request)
    {
        //Looking for message root for offer
        $root = Message::with('sender', 'offer')->where('offer_id', $request->id)->whereNull('parent_id')->first();
//        dump($root);

        $current_user = Auth::user();

        //Determine the recipient of the message
        $offer = Offer::findOrFail($request->id);
        if ($offer->seller_id != $current_user->id) {
            $recipient_id = $offer->seller_id;
        } else {
            $recipient_id = $offer->search->user_id;
        }

        $message = new Message([
            'offer_id' => $request->id,
            'text' => remove_foreign_uri($request->comment),
            'sender_id' => $current_user->id,
            'recipient_id' => $recipient_id,
        ]);

        //TODO: Возникает ошибка SQL если значение поля recipient_id не установлено
        $message->save();
//        $message->makeRoot(0);


        if (isset($root)) {
            $root->addChild($message);
        }

        return back();
    }


    public function acceptOffer(AcceptOfferRequest $request)
    {
//        dump($request->search_id . " " . $request->offer_id);
//
//        dd('Validation accept offer complete');

//        $offer = Offer::findOrFail($request->offer_id)->where('search_id', $request->search_id)->firstOrFail();
//        dd($offer);

        //Check offer_id, search_id and сhecking the current user to accept the offer
        $offer = Offer::findOrFail($request->offer_id);
        $search = Search::findOrFail($request->search_id);

        if ($offer->search_id != $request->search_id ||
            Auth::id() != $search->user_id ||
            isset($search->offer_id_accepted)) {
            return back();
        }

        $search->offer_id_accepted = $offer->id;
        $search->offer_accepted_at = now();
        $search->save();

        event(new OfferAccepted($offer));

        return back();
    }

    //TODO: проверить входные параметры
    public function addMention(Request $request)
    {

        $offer = Offer::findOrFail($request->id);
        $current_user = Auth::user();

        //Check whether the user can leave feedback
        if ($offer->search->user_id != $current_user->id) {
            return back();
        }

        //TODO: Модель посредник возвращается с пустыми данными. Почему?
//        dd($offer->user()->getParent());

        //Check if feedback is left.
        if (isset($offer->mention_id)) {
            return back();
        }


//        if (Auth::user()->role_id == 3) {
//            $seller = Seller::lockForUpdate()->findOrFail($offer->seller_id);
//            $seller->rating = $offer->rating;
//            $seller->save();
//        }


        try {
            DB::transaction(function () use ($request, $offer, $current_user) {

                $offer->rating = $request->rating;
                $mention = new Mention([
                    'sender_id' => $current_user->id,
                    'recipient_id' => $offer->seller_id,
                    'text' => $request->comment,
                ]);
//                dd($mention);


                $mention_saved = $mention->save();
                $offer->mention_id = $mention->id;
                $offer_saved = $offer->save();

                $seller = Seller::lockForUpdate()->findOrFail($offer->seller_id);
                $seller->mention_count++;
                $seller->rating += $offer->rating;
                $seller_saved = $seller->save();

                if (isset($mention_saved, $offer_saved, $seller_saved)) {
                    event(new MentionCreated($mention));
                }

            }, 5);


        } catch (\Exception $ex) {
            Log::critical('Class: ' . __CLASS__ . ' Method: ' . __METHOD__ . '. ' .
                'Failed to update seller rating. Simultaneous access attempt');
        }


        return back();

    }


    public function showCatalog()
    {
        if (Gate::denies('edit-settings')) {
            return back();
        }

        $devices = Device::Pluck('name', 'id');
        $brands = Brand::Pluck('name', 'id');

        return view('cabinet.settings.catalog', ['devices' => $devices, 'brands' => $brands]);
    }


    public function showUsers()
    {
        $users = User::paginate(5);
//        dd($users);

        return view('cabinet.users', compact('users'));
    }

}
