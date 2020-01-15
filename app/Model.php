<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{

    public $timestamps = false;

    protected $fillable = ['name'];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['device', 'brand'];


    public function device()
    {
        return $this->belongsTo('App\Device');
    }


    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function spares()
    {
        return $this->belongsToMany('App\Spare');
    }
}
