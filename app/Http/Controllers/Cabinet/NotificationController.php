<?php

namespace App\Http\Controllers\Cabinet;

use App\Notification;
use App\Notifications\NewDeal;
use App\Notifications\NewMention;
use App\Notifications\NewOffer;
use App\Notifications\NewSearch;
use App\Notifications\NewUser;
use App\User;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getUsersNotifications(Request $request)
    {
//        $userNotifications = Notification::where('event_id', 1)

        $size = $request->input('size');


        $user = Auth::user();
        $notifications = [];
        if ($user->role_id == 3) {
            $count = $this->countAllUnreadNotifications($user);
            $notifications = $user->notifications()->where('type', NewUser::class)->paginate($size);

        }
//        dd($user->notifications()->where('type', NewUser::class));

        return view('cabinet.notifications.users', compact('notifications', 'count'));
    }


    public function getMentionsNotifications(Request $request)
    {
//        $userNotifications = Notification::where('event_id', 1)

        $size = $request->input('size');


        $user = Auth::user();
        $notifications = [];
        if ($user->role_id == 3) {
            $count = $this->countAllUnreadNotifications($user);
            $notifications = $user->notifications()->where('type', NewMention::class)->paginate($size);

        }
//        dd($user->notifications()->where('type', NewUser::class));

        return view('cabinet.notifications.mentions', compact('notifications', 'count'));
    }


    public function getSearchesNotifications(Request $request)
    {


//        dd($request->all());

        $size = $request->input('size');

        $user = Auth::user();

        $notifications = [];
        if ($user->role_id == 3) {
            $count = $this->countAllUnreadNotifications($user);
//            dd($notifications_count);
            $notifications = $user->notifications()->where('type', NewSearch::class)->paginate($size);

            return view('cabinet.notifications.searches', compact('notifications', 'count'));
        }

        return back();
    }


    public function getDealsNotifications(Request $request)
    {
        $size = $request->input('size');

        $user = Auth::user();

        $notifications = [];
        if ($user->role_id == 3) {
            $count = $this->countAllUnreadNotifications($user);
//            dd($notifications_count);
            $notifications = $user->notifications()->where('type', NewDeal::class)->paginate($size);

            return view('cabinet.notifications.deals', compact('notifications', 'count'));
        }

        return back();
    }


    public function getOffersNotifications(Request $request)
    {
        $size = $request->input('size');

        $user = Auth::user();

        $notifications = [];
        if ($user->role_id == 3) {
            $count = $this->countAllUnreadNotifications($user);
//            dd($notifications_count);
            $notifications = $user->notifications()->where('type', NewOffer::class)->paginate($size);

            return view('cabinet.notifications.offers', compact('notifications', 'count'));
        }

        return back();
    }


    private function countAllUnreadNotifications($user)
    {
        $counter =
            [
                'search' => $user->notifications()->where('type', NewSearch::class)->where('read_at', null)->count(),
                'user' => $user->notifications()->where('type', NewUser::class)->where('read_at', null)->count(),
                'mention' => $user->notifications()->where('type', NewMention::class)->where('read_at', null)->count(),
                'deal' => $user->notifications()->where('type', NewDeal::class)->where('read_at', null)->count(),
                'offer' => $user->notifications()->where('type', NewOffer::class)->where('read_at', null)->count(),
            ];
        $total = $counter['search'] + $counter['user'] + $counter['mention'] + $counter['deal'] + $counter['offer'];
        $counter['total'] = $total;

        return $counter;
    }


}
