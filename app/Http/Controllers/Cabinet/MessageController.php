<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function getIncomingMessages(Request $request)
    {

//        $perPage = $request->input('size');
        $perPage = 2;

        $user = Auth::user();
        $offers = $user->offers()->limit($perPage)->get();
//        dd($offers);
        $offers_id = $offers->pluck('id');

        //Get messages roots
        $roots = Message::getRoots()->whereIn('offer_id', $offers_id);
//        dd($roots);

        $messages = [];
        foreach ($roots as $root) {
            $root->getTree();

            if ($root->hasChildren()) {
                $last_message = $root->getLastChild();
            } else {
                $last_message = $root;
            }

            if ($last_message->recipient_id == $user->id) {

                $last_message->load('sender');
                $messages[$last_message->offer_id] = $last_message;
            }

        }

//        dd($messages);



        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentMessages = array_slice($messages, $perPage * ($currentPage - 1), $perPage);
        $messages = new LengthAwarePaginator($currentMessages, count($messages), $perPage, $currentPage);
//        dd($messages);

//        dd($messages);

//        $messages->forPage();



        return view('cabinet.messages.incoming', compact( 'user','offers', 'messages'));
    }


    public function getOutgoingMessages(Request $request)
    {
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


}
