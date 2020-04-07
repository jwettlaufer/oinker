<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    //
    use SoftDeletes;

      protected $table = 'likeables';

    protected $fillable = array(
      'likes_id',
      'user_id',
      'likeable_type'
    );

    //Get all of the products that are assigned this like.

    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'likeable');
    }

     //Get all of the posts that are assigned this like.

    public function oinks()
    {
        return $this->morphedByMany('App\Oink', 'likeable');
    }



}
