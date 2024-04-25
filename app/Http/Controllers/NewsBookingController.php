<?php

namespace App\Http\Controllers;

use App\Models\NewsBooking;
use Illuminate\Http\Request;

class NewsBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news_posts = NewsBooking::all();
        return view('news.booking.index', compact('news_posts'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(NewsBooking $newsBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsBooking $newsBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        NewsBooking::find($id)->delete();

        return redirect()->route('newsBookings.index')->with('success', '削除ができました');
    }
}
