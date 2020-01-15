<?php

namespace App\Listeners;

use App\Notifications\NewSearch;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SearchCreated as SearchCreatedEvent;

class SearchCreated
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
     * @param  object  $event
     * @return void
     */
    public function handle(SearchCreatedEvent $event)
    {
//        dd('Search was created');
        $admin = User::where('role_id', 3)->first();
        $admin->notify(new NewSearch($event->search));
    }
}
