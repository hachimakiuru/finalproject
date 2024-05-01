<?php

namespace App\Http\Controllers;

use App\Models\RestaurantLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantLikeController extends Controller
{
    public function store($postId)
    {
        
        $like = new RestaurantLike();
        $like->user_id = Auth::user()->id;
        $like->restaurant_post_id = $postId;
        $like->save();
    }

    public function destroy($postId)
    {
        RestaurantLike::where('restaurant_post_id', $postId)
            ->where('user_id', Auth::user()->id)
            ->delete();

    }

}
