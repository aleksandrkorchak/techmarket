<?php

namespace App;

use Franzose\ClosureTable\Models\Entity;

class Mention extends Entity implements MentionInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mentions';

    /**
     * ClosureTable model instance.
     *
     * @var mentionClosure
     */
    protected $closure = 'App\MentionClosure';


    protected $fillable = ['text', 'sender_id', 'recipient_id'];

    public $timestamps = true;


    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
