<?php

namespace App\Events;

use App\Mention;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MentionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mention;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mention $mention)
    {
        $this->mention = $mention;
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
