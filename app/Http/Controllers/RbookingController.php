<?php

namespace App\Http\Controllers;

use App\Models\RestaurantForm;
use Illuminate\Http\Request;

class RbookingController extends Controller
{
    public function index()
    {
        $restaurant_posts = RestaurantForm::all();
        return view('restaurants.booking.index', compact('restaurant_posts'));
    }

    public function update($id)
    {
        dd('test');
        // return view('')
    }

    public function destroy($id)
    {
        // dd('test');
        RestaurantForm::find($id)->delete();

        return redirect()->route('rbooking.index')->with('success', '削除ができました');
    }
}
