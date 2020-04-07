<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Illuminate\Support\Facades\Auth;

class Oink extends Model

{
  use CanBeLiked;
    //
    protected $fillable = array(
      'message',
    );

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function comments()
    {
      return $this->morphMany('App\Comment', 'commentable')->whereNull('parent_id');
    }

    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }

}
