<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captcha extends Model
{
    protected $table = 'captcha';

    protected $fillable = ['token', 'result'];

    public $timestamps = false;
}
