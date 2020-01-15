<?php

namespace App\Listeners;

use App\Events\OfferAccepted;
use App\Notifications\NewDeal;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OfferAcceptedNotification
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
     * @param  OfferAccepted  $event
     * @return void
     */
    public function handle(OfferAccepted $event)
    {
//        dd("Offer accepted");
        $admin = User::where('role_id', 3)->first();
        $admin->notify(new NewDeal($event->offer));
    }
}
