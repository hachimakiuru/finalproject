<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantComment;

class RestaurantCommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーションルールを定義することが適切です
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'restaurant_post_id' => 'required|exists:restaurant_posts,id',
            'comment' => 'required|string',
        ]);

        $restaurantComment = RestaurantComment::create($validatedData);

        return response()->json($restaurantComment, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestaurantComment  $restaurantComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantComment $restaurantComment)
    {
        // バリデーションルールを定義することが適切です
        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'restaurant_post_id' => 'sometimes|required|exists:restaurant_posts,id',
            'comment' => 'sometimes|required|string',
        ]);

        $restaurantComment->update($validatedData);

        return response()->json($restaurantComment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestaurantComment  $restaurantComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantComment $restaurantComment)
    {
        $restaurantComment->delete();

        return response()->json(null, 204);
    }
}

