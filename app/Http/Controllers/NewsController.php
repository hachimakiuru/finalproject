<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsTimeLine;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // リクエストからパラメータを取得します
    $type = $request->input('type', 'event'); // デフォルト値を'event'に設定

    // NewsTimeLineモデルから最新の投稿を取得します（適宜ソートやフィルタリングを追加）
    $posts = NewsTimeLine::latest()->get();

    // パラメータに基づいて適切なビューを返します
    if ($type === 'event') {
        return view('news.event.index', compact('posts'));
    } elseif ($type === 'hotel-info') {
        return view('news.hotel-info.index', compact('posts'));
    } elseif ($type === 'japan-culture') {
        return view('news.japan-culture.index', compact('posts'));
    } else {
        return view('news.others.index', compact('posts'));
    }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
