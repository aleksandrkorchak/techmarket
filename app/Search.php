<?php

namespace App;

use App\Events\SearchCreated;
use App\Events\SearchRetrieved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Search extends Model
{

    use Notifiable;

    protected $table = 'searches';

//    protected $fillable = ['offer_accepted'];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'retrieved' => SearchRetrieved::class,
        'created' => SearchCreated::class
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function model()
    {
        return $this->belongsTo('App\Model');
    }

    public function spare()
    {
        return $this->belongsTo('App\Spare');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

}
