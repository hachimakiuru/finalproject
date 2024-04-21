<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller

{
    public function store($postId)
    {
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->experience_post_id = $postId;
        $like->save();

        return back();
    }

    public function destroy($postId)
    {
        Like::where('experience_post_id', $postId)
            ->where('user_id', Auth::user()->id)
            ->delete();

        return back();
    }
}
