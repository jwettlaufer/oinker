<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = array(
      'body',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
