<?php

namespace App\Http\Controllers;

use App\Models\NewsBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsTimeLine;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsTimeLines = NewsTimeLine::all();

        return view('news.event.index', compact('newsTimeLines'));
    }

    public function event()
    {
        $newsTimeLines = NewsTimeLine::where('genre_id', 1)->get();
        return view('news.event.index', compact('newsTimeLines'));
    }

    public function hotelInfo()
    {
        $newsTimeLines = NewsTimeLine::where('genre_id', 2)->get();
        return view('news.hotel-info.index', compact('newsTimeLines'));
    }

    public function japanCulture()
    {
        $newsTimeLines = NewsTimeLine::where('genre_id', 3)->get();
        return view('news.japan-culture.index', compact('newsTimeLines'));
    }

    public function others()
    {
        $newsTimeLines = NewsTimeLine::where('genre_id', 4)->get();
        return view('news.others.index', compact('newsTimeLines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーションルールの定義
        $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start' => 'required',
            'price' => 'required|string',
            'place' => 'required|string',
            'others' => 'nullable|string',
            'genre_id' => 'required',
        ]);
        // 新しい NewsTimeLine インスタンスの作成
        $newsTimeLine = new NewsTimeLine([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'start' => $request->input('start'),
            'price' => $request->input('price'),
            'place' => $request->input('place'),
            'others' => $request->input('others'),
            'genre_id' => intval($request->input('genre_id'))
        ]);
        // dd($newsTimeLine);

        // 写真がアップロードされている場合
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/img'), $imageName);
            $newsTimeLine->image = $imageName;
        }

        // レコードを保存
        $newsTimeLine->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $newsTimeLine = NewsTimeLine::find($id);
        return view('news.show', compact('newsTimeLine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $newsTimeLine = NewsTimeLine::find($id);

        return view('news.news-edit', compact('newsTimeLine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newsTimeLine = NewsTimeLine::find($id);


        $newsTimeLine -> title = $request -> title;
        $newsTimeLine -> content = $request -> content;
        $newsTimeLine -> place = $request -> place;
        $newsTimeLine -> price  = $request -> price ;
        $newsTimeLine -> others = $request -> others;
        $newsTimeLine -> start = $request -> start;

        // $newsTimeLine -> image = $request -> image;

        // 画像がアップロードされた場合は保存してデータベースにファイル名を更新
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/img');
        //     $newsTimeLine->image = basename($imagePath);
        // }

        $genre = $newsTimeLine->genre_id;

        $newsTimeLine->save();

        if ($genre == 1) {
            return redirect()->route('news.event');
        } elseif ($genre == 2) {
            return redirect()->route('news.hotel-info');
        } elseif ($genre == 3) {
            return redirect()->route('news.japan-culture');
        } elseif ($genre == 4) {
            return redirect()->route('news.others');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newsTimeLine = NewsTimeLine::find($id);

        $genre = $newsTimeLine->genre_id;

        $newsTimeLine->delete();

        if ($genre == 1) {
            return redirect()->route('news.event');
        } elseif ($genre == 2) {
            return redirect()->route('news.hotel-info');
        } elseif ($genre == 3) {
            return redirect()->route('news.japan-culture');
        } elseif ($genre == 4) {
            return redirect()->route('news.others');
        }
    }

    // public function formStore(Request $request)
    // {

    //     // バリデーションルールの定義
    //     $validatedData = $request->validate([
    //         'day' => 'required|date',
    //         'time1' => 'required|date_format:H:i',
    //         'time2' => 'required|date_format:H:i',
    //         'number_guests' => 'required|integer|min:1',
    //         'memo' => 'nullable|string|max:255',
    //     ]);


    //     // dd($request);
    //     try {
    //         // 新しい RestaurantForm インスタンスの作成
    //         $newsBooking = new NewsBooking([
    //             'user_id' => Auth::id(), // ログインユーザーのIDを取得
    //             'news_time_line_id' => $request->input('news_time_line_id'), // リクエストから restaurant_post_id を取得
    //             'day' => $request->input('day'),
    //             'time1' => $request->input('time1'),
    //             'time2' => $request->input('time2'),
    //             'number_guests' => $request->input('number_guests'),
    //             'memo' => $request->input('memo'),
    //         ]);


    //         // レコードを保存
    //         $newsBooking->save();

    //         // 成功メッセージをフラッシュするなどの処理
    //         session()->flash('success', 'データが正常に保存されました。');

    //         // リダイレクト先を指定



    //         return redirect()->route('restaurants.index')->with('success', '予約フォームの送信が完了しました。');
    //     } catch (\Exception $e) {
    //         // 例外が発生した場合はエラーメッセージを表示し、フォーム入力を再表示
    //         return back()->withInput()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }
}
