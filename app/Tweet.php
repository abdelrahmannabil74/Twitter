<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
   [

       'body','user_id'
   ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User','likes','tweet_id','user_id');
    }


}
