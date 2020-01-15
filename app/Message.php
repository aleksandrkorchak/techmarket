<?php

namespace App;

use App\Events\MessageRetrieved;
use Franzose\ClosureTable\Models\Entity;

class Message extends Entity implements MessageInterface
{

    protected $fillable = ['text', 'offer_id', 'sender_id', 'recipient_id', 'read_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * ClosureTable model instance.
     *
     * @var MessageClosure
     */
    protected $closure = 'App\MessageClosure';

    public $timestamps = true;


    protected $dispatchesEvents = [
        'retrieved' => MessageRetrieved::class
    ];

    public function sender()
    {
        return $this->belongsTo('App\User');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User');
    }

    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

}
