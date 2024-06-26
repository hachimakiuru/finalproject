<?php

namespace App\Http\Controllers;

use App\Models\RestaurantForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RbookingController extends Controller
{
    public function index()
    {
        $restaurant_posts = RestaurantForm::all();
        $times = [];
        for ($hour = 6; $hour < 24; $hour++) {
            $times[] = sprintf('%02d:00', $hour);
        }

        return view('restaurants.booking.index', compact('restaurant_posts', 'times'));
    }

    // public function edit(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('users.edit', compact('user'));
    // }


    // public function edit(string $id)
    // {
    //     $restaurantForm =  RestaurantForm::findorFail($id);
    //     return view('rbooking.edit', compact('restaurantForm'));
    // }

    public function update(Request $request, $id)
    {
        // dd($id);

        $restaurantForm = RestaurantForm::find($id);

        $restaurantForm->update([
            'user_id' => Auth::user()->id, // ログインユーザーのIDを取得
            // 'restaurant_post_id' => $request->restaurant_post_id,
            'day' => $request->day,
            'time1' => $request->time1,
            'time2' => $request->time2,
            'number_guests' => $request->number_guests,
            'memo' => $request->memo,
        ]);
        return redirect()->route('rbooking.index')->with('success', 'The booking information has been updated');
    }

    public function destroy($id)
    {
        // dd('test');
        RestaurantForm::find($id)->delete();

        return redirect()->route('rbooking.index')->with('success', 'The booking request has been deleted');
    }





    public function store(Request $request)
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
            $restaurantForm = new RestaurantForm([
                'user_id' => Auth::id(), // ログインユーザーのIDを取得
                'restaurant_post_id' => $request->input('restaurant_post_id'), // リクエストから restaurant_post_id を取得
                'day' => $request->input('day'),
                'time1' => $request->input('time1'),
                'time2' => $request->input('time2'),
                'number_guests' => $request->input('number_guests'),
                'memo' => $request->input('memo'),
            ]);

            // レコードを保存
            $restaurantForm->save();

            // 成功メッセージをフラッシュするなどの処理
            session()->flash('success', 'データが正常に保存されました。');

            // リダイレクト先を指定



            return redirect()->route('restaurants.index')->with('success', 'Booking request has been succesfully sent');
        } catch (\Exception $e) {
            // 例外が発生した場合はエラーメッセージを表示し、フォーム入力を再表示
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
