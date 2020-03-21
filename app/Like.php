<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = array(
      'likes_id', 'user_id', 'likeable_type'
    );

    use SoftDeletes;

    protected $table = 'likes';

    public function comments()
    {
        return $this->belongsTo('App\Like');
    }

    public function posts()
    {
        return $this->belongsTo('App\Like');
    }

}
