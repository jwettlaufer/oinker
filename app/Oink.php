<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

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
      return $this->hasMany('App\Like');
    }

}
