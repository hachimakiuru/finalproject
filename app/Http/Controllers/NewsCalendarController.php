<?php

namespace App\Http\Controllers;

use App\Models\NewsCalendar;
use Illuminate\Http\Request;

class NewsCalendarController extends Controller
{
    public function view()
    {
        $events = NewsCalendar::all();
        return view('news.calendar', compact('events'));
    }

    public function search(Request $request) 
    {
        $resultArr = array();
        $results = NewsCalendar::whereDate('start', $request->date)->get();
        foreach($results as $item)
        {
            array_push($resultArr, $item);
        }
        return $resultArr;
    }

    
}
