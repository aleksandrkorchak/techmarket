<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    public $timestamps = false;

    protected $fillable = ['name'];

    public function devices()
    {
        return $this->belongsToMany('App\Device');
//        return $this->belongsToMany('App\Device', 'models')->withPivot('name')->as('model');
    }

    public function models()
    {
        return $this->hasMany('App\Model');
    }
}
