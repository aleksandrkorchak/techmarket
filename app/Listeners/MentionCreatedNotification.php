<?php

namespace App\Listeners;

use App\Events\MentionCreated;
use App\Notifications\NewMention;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MentionCreatedNotification
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
     * @param  MentionCreated  $event
     * @return void
     */
    public function handle(MentionCreated $event)
    {
//        dd('Listener mention');
        $admin = User::where('role_id', 3)->firstOrFail();
        $admin->notify(new NewMention($event->mention));
    }
}
