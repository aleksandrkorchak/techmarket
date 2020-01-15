<?php

namespace App\Listeners;

use App\Notifications\NewUser;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserCreated as UserCreatedEvent;
//use App\Notification;

class UserCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
//        dd('Created new user');
//        app('log')->info('Created new user');
//        $notification = new Notification();
//        $notification->user_id = $event->user->id;
//        $role = $event->user->role_id;
//        switch ($role) {
//            case 1:
//                $notification->event_id = 1;
//                break;
//
//            case 2:
//                $notification->event_id = 2;
//                break;
//        }
//        $notification->text = 'Some text';
//        $notification->save();


        $admin = User::where('role_id', 3)->first();
//        dd($toUsers);
        $admin->notify(new NewUser($event->user));

//        $event->user

    }
}
