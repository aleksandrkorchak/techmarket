<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    public function sellers()
    {
        return $this->hasMany('App\Seller');
    }
}
