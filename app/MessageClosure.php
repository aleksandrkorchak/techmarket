<?php
namespace App;

use Franzose\ClosureTable\Models\ClosureTable;

class MessageClosure extends ClosureTable implements MessageClosureInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'message_closure';
}
