<?php

namespace App\Http\Controllers;

use App\Models\NewsBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function newsBookingStore(Request $request)
    {

        // バリデーションルールの定義
        $validatedData = $request->validate([
            'day' => 'required|date',
            'time1' => 'required|date_format:H:i',
            'time2' => 'required|date_format:H:i',
            'number_guests' => 'required|integer|min:1',
            'memo' => 'nullable|string|max:255',
        ]);

        try {
            // 新しい RestaurantForm インスタンスの作成
            $newsBooking = new NewsBooking([
                'user_id' => Auth::id(), // ログインユーザーのIDを取得
                'news_time_line_id' => $request->input('news_time_line_id'), // リクエストから restaurant_post_id を取得
                'day' => $request->input('day'),
                'time1' => $request->input('time1'),
                'time2' => $request->input('time2'),
                'number_guests' => $request->input('number_guests'),
                'memo' => $request->input('memo'),
            ]);


            // レコードを保存
            $newsBooking->save();

            // 成功メッセージをフラッシュするなどの処理
            session()->flash('success', 'データが正常に保存されました。');

            // リダイレクト先を指定



            return redirect()->route('restaurants.index')->with('success', '予約フォームの送信が完了しました。');
        } catch (\Exception $e) {
            // 例外が発生した場合はエラーメッセージを表示し、フォーム入力を再表示
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
