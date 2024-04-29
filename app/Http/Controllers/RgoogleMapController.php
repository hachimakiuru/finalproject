<?php

namespace App\Http\Controllers;

use App\Models\RgoogleMap;
use Illuminate\Http\Request;

class RgoogleMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restaurants.google-map.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RgoogleMap $rgoogleMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RgoogleMap $rgoogleMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RgoogleMap $rgoogleMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RgoogleMap $rgoogleMap)
    {
        //
    }
}
