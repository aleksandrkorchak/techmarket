<?php

namespace App\Listeners;


use App\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\MessageRetrieved as MessageRetrievedEvent;
use Illuminate\Support\Facades\Auth;

class MessageRetrieved
{

    private $auth_user;


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->auth_user = Auth::user();
    }

    /**
     * Handle the event.
     *
     * @param MessageRetrieved $event
     * @return void
     */
    public function handle(MessageRetrievedEvent $event)
    {

        if (empty($event->message->read_at)) {
            if ($event->message->recipient_id == $this->auth_user->id) {

                //disable the event dispatcher, because in franzose/closure-table handled the 'saved' event
                // getting the dispatcher instance (needed to enable again the event observer later on)
                $dispatcher = Message::getEventDispatcher();
                // disabling the events
                Message::unsetEventDispatcher();
                $event->message->update(['read_at' => now()]);
                // enabling the event dispatcher
                Message::setEventDispatcher($dispatcher);

            }
        }

    }
}
