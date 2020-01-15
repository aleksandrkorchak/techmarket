<?php

namespace App\Listeners;

use App\User;
use App\View;
use Dotenv\Validator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SearchRetrieved as SearchRetrievedEvent;
use Illuminate\Support\Facades\Auth;

class SearchRetrieved
{

    protected $user_id;



    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_id = Auth::user()->id;
    }



    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle(SearchRetrievedEvent $event)
    {

        //If the user doesn't own the search then try to add a new custom view
        if ($this->user_id != $event->search->user_id) {
//            dd('Add new view: ' . $this->user_id . ' ' . $event->search_id);
            View::firstOrCreate(['user_id' => $this->user_id, 'search_id' => $event->search->id]);
        }

    }



}
