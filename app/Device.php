<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    //TODO: При добавлении нового устройства должна формироваться соответствующая ему категория
    //TODO: При изменении существующено устройства должна меняться его категория

    public $timestamps = false;

    protected $fillable = ['name'];

    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }


    public function spares()
    {
        return $this->belongsToMany('App\Spare');
    }


    public function sellers()
    {
        return $this->belongsToMany('App\Seller');
    }
}
