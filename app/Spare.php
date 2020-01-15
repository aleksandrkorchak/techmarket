<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{

    public $timestamps = false;

    protected $fillable = ['name'];

    public function models()
    {
        return $this->belongsToMany('App\Model');
    }

    public function devices()
    {
        return $this->belongsToMany('App\Device');
    }
}
