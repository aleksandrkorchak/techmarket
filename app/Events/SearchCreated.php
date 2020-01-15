<?php

namespace App\Events;

use App\Notification;
use App\Search;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class SearchCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $search;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Search $search)
    {
//        dd('Search created event ');
        $this->search = $search;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
