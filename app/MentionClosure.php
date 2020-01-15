<?php
namespace App;

use Franzose\ClosureTable\Models\ClosureTable;

class MentionClosure extends ClosureTable implements MentionClosureInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mention_closure';
}
