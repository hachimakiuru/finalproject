<?php

namespace App\Http\Controllers;

use App\Models\RestaurantLike;
use Illuminate\Http\Request;
use App\Models\RestaurantPost;
use App\Models\RestaurantPostSearch;
use Illuminate\Support\Facades\Auth;

class RestaurantPostController extends Controller
{
    public function index(){
        $restaurants = RestaurantPost::all();

        if($restaurants ) {
            foreach($restaurants  as $restaurant) { 
                $likes = RestaurantLike::where('user_id', Auth::user()->id)
                    ->where('restaurant_post_id', $restaurant->id)
                    ->get();
                $restaurant['isLike'] = count($likes) > 0 ? true : false;
            }
        }
        
        return view('restaurants.index', compact('restaurants'));

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
        $restaurant->user_id = $user_id; 
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
        return view('restaurants.show', ['restaurant' => $restaurant]);
    }
}