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
            'restaurant_post_id' => 'required|exists:restaurant_posts,id',
            'comment' => 'required|string|max:255', // 最大255文字まで許可
        ]);
    
        // ログインしているユーザーのIDを取得
        $userId = auth()->id();
    
        // ログインしているユーザーのIDを使用してRestaurantCommentモデルを作成し、リクエストされたデータを保存
        $restaurantComment = RestaurantComment::create([
            'user_id' => $userId,
            'restaurant_post_id' => $validatedData['restaurant_post_id'],
            'comment' => $validatedData['comment'],
        ]);
    
        // レスポンスとしてJSON形式で作成したコメントを返す
        return redirect()->back();
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

        return redirect()->back();
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

        return redirect()->back();
    }
}

