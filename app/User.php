<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone','username','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets(){
        return $this->hasMany('App\Tweet');
    }

    public function following(){
        return $this->belongsToMany('App\User','followers','following_id','follower_id');
    }

    public function followers(){
        return $this->belongsToMany('App\User','followers','follower_id','following_id');
    }

    public function likes(){
        return $this->belongsToMany('App\Tweet','likes','user_id','tweet_id');
    }



}
