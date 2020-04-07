<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanLike;

class User extends Authenticatable
{
    use Notifiable, CanFollow, CanBeFollowed, CanLike; //See we used CanFollow and CanBeFollowed Traits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function oinks() {

    return $this->hasMany('App\Oink');
  }

  public function comments() {

  return $this->hasMany('App\Comment');
}

  public function profiles() {

  return $this->hasOne('App\Profile');
}

  public function likes() {

    return $this->belongsToMany('App\Oink', 'likes', 'user_id', 'oink_id');
}

  public function likedPosts() {

    return $this->morphedByMany('App\Oink', 'likeable')->whereDeletedAt(null);
  }

}
