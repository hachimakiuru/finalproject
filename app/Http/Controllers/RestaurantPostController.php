<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestaurantPostController extends Controller
{
        public function index(User $user){
        $users =User::all();
        $restaurants = RestaurantPost::all();
        return view('restaurants.index' , ['restaurants' =>$restaurants,'users'=>$users ]);
    }

    public function create(){
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $Data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre_place' => 'required',
            'genre_variety' => 'required',
            'genre_religion' => 'required',
            'genre_payment' => 'required',
        ]);
        
        $image = $request->file('image_path');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/restaurant_images', $imageName);

        $user_id = auth()->id();
        
        $restaurant = new RestaurantPost($Data);
        $restaurant->user_id = $user_id; // リクエストを送信したユーザーの ID を保存
        $restaurant->name = $Data['name'];
        $restaurant->address = $Data['address'];
        $restaurant->image_path = 'restaurant_images/' . $imageName;
        $restaurant->genre_place = $Data['genre_place'];
        $restaurant->genre_variety = $Data['genre_variety'];
        $restaurant->genre_religion = $Data['genre_religion'];
        $restaurant->genre_payment = $Data['genre_payment'];
        $restaurant->save();
        
        // データベースからすべてのレストランポストを取得
        $restaurant_posts = RestaurantPost::all();
        
       return redirect(route('restaurants.index'));
    
    }

    public function edit(RestaurantPost $restaurant){
        return view('restaurants.edit' , ['restaurant' =>  $restaurant]);
    }

    public function update(RestaurantPost $restaurant, Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre_place' => 'required',
            'genre_variety' => 'required',
            'genre_religion' => 'required',
            'genre_payment' => 'required',
        ]);
    
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/restaurant_images', $imageName);
            $validatedData['image_path'] = 'restaurant_images/' . $imageName;
        }
    
        $restaurant->update($validatedData);
    
        return redirect(route('restaurants.index'))->with('success', 'Updated Successfully');
    }
    public function destroy(RestaurantPost $restaurant) {
        $restaurant->delete();
    
        return redirect()->route('restaurants.index')->with('success', '削除しました');
    }
    public function show(RestaurantPost $id)
    {
        $restaurant = RestaurantPost::findOrFail($id);
        // レストラン投稿に関連するユーザーモデルを取得
        $user = User::find($restaurant->user_id);
         // ユーザーモデルが存在するか確認して、名前を取得する
         $user_name = $user ? $user->name : "ユーザーが存在しません";
        return view('restaurants.show', ['restaurant' => $restaurant]);
    }
    
        

}
