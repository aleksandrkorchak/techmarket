<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i:s');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function quality()
    {
        return $this->belongsTo('App\Quality');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function user()
    {
        return $this->hasOneThrough('App\User', 'App\Seller', 'user_id', 'id', 'seller_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function search()
    {
        return $this->belongsTo('App\Search');
    }

    public function mention()
    {

        return $this->belongsTo('App\Mention');
    }

}
