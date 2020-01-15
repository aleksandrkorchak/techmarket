<?php

namespace App\Http\Controllers;


use App\Model;
use App\User;
use App\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSearch;
use App\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\State;
use App\Quality;
use App\Wait;
use App\Spare;
use App\Search;
use App\Brand;

class IndexController extends Controller
{
    public function index()
    {
        $devices = DB::table('devices')->pluck('name')->all();

//        print_r($devices);

        return view('index', ['devices' => $devices]);
    }

    public function search()
    {
        $devices = DB::table('devices')->pluck('name', 'id')->all();
        $brands = Brand::pluck('name', 'id');
        $states = State::pluck('name', 'id');
        $qualities = Quality::pluck('name', 'id');
        $waits = Wait::orderBy('id')->pluck('name', 'id');


        return view('search', ['devices' => $devices,
            'brands' => $brands,
            'states' => $states,
            'qualities' => $qualities,
            'waits' => $waits
        ]);
    }


    //TODO: Перепроверить контроллеры и использовать по возможности функцию findOrFail
    public function searchById($id)
    {
        $search = Search::findOrFail($id);

        //User full name
        $user = User::find($search->user_id);
        $user_name = $user->name;
        $user_surname = $user->surname;
        $user_login = $user->login;
        if ($user_name && $user_surname) {
            $user_full_name = $user_name . ' ' . $user_surname . ' (' . $user_login . ')';
        } else {
            $user_full_name = $user_login;
        }

        //User city
        $user_city = $user->city;

        //Spare name
        $spare_part = Spare::find($search->spare_id)->name;

        //Model name
        $model = Model::find($search->model_id);
        $model_name = $model->name;
        $brand_name = Brand::find($model->brand_id)->name;
        $model_full_name = $brand_name . ' ' . $model_name;

        //Search time
        $search_date = $search->created_at;

        //Comment
        $search_comment = $search->comment ?? '';

        //Views
        $views_count = View::where('search_id', $search->id)->count();
//        dd($views_count);

        if (Auth::user()->role_id === 3) {
            return view('cabinet.admin.search',
                compact('search',
                    'search_date',
                    'search_comment',
                    'user_full_name',
                    'user_city',
                    'model_full_name',
                    'spare_part',
                    'views_count'));
        }
    }


    public function approveSearch($id)
    {
        if (Auth::user()->role_id === 3) {


            $search = Search::findOrFail($id);
            $search->approve_at = now();
            $search->save();


            return redirect()->route('show.searches.notifications');
        }
    }


    public function storeSearch(StoreSearch $request)
    {

        if (Auth::guest()) {
            //TODO: Сохранить и передать данные после регистрации
            return redirect()->route('login')->withInput()->withErrors('Сначала зарегистрируйтесь');
        }

        $new_search = new Search;
        $new_search->user_id = Auth::user()->id;

//        $new_search->device_id = $request->device;
//        $new_search->brand_id = $request->brand;


        $new_search->model_id = $request->model;
        $new_search->spare_id = $request->spare;
        $new_search->state_id = $request->state;
        $new_search->quality_id = $request->quality;
        $new_search->wait_id = $request->wait;
        $new_search->comment = $request->comment;
        $new_search->save();



        return redirect()->route('show.profile', ['user_id' => Auth::id()]);
    }
}
