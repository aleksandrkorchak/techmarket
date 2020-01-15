<?php

namespace App\Listeners;

use App\Events\OfferCreated;
use App\Notifications\NewOffer;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferCreatedNotification
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
     * @param  OfferCreated  $event
     * @return void
     */
    public function handle(OfferCreated $event)
    {
        $admin = User::where('role_id', 3)->firstOrFail();
        $admin->notify(new NewOffer($event->offer));
    }
}
