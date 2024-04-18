<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantPost; // RestaurantPostモデルを使用するために必要

class RestaurantPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restaurants.restaurant-index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurants.restaurant-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    // 投稿を削除
    public function destroy($id)
    {

    }
}
