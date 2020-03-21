<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    //
    public function likePost($id)
    {

        $this->handleLike('App\Post', $id);
        return redirect()->back();
    }

    public function likeComment($id)
    {

        $this->handleLike('App\Comment', $id);
        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikesId($id)->where("profile_id", "=", $profile->id)->firstOrFail();
        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likes_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
}
