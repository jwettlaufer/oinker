<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oink extends Model
{
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

}
