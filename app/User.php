<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserCreated;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'password', 'email', 'city', 'phone', 'role_id', 'user', 'surname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserCreated::class
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function seller()
    {
        return $this->hasOne('App\Seller');
    }

    public function searches()
    {
        return $this->hasMany('App\Search');
    }

    public function offers()
    {
        return $this->hasManyThrough('App\Offer', 'App\Seller', 'user_id', 'seller_id');
    }


}
