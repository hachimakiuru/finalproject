<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperiencePost;
use App\Models\Like;
use App\Models\NewsBooking;
use App\Models\NewsCalendar;
use App\Models\NewsTimeLine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class ExperienceController extends Controller
{
    /**

     */
    public function index()
    {
        $experiences = ExperiencePost::all(); // あなたのアプリケーションに適した方法でデータを取得してください
        
        if($experiences) {
            foreach($experiences as $experience) {
                // $experience['isLike'] = 
                $likes = Like::where('user_id', Auth::user()->id)
                    ->where('experience_post_id', $experience->id)
                    ->get();
                $experience['isLike'] = count($likes) > 0 ? true : false;
            }
        }
        
        return view('experience.index', compact('experiences'));
    }

    /**

     */
    public function create()
    {
        //
    }

    /**

     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'favorite' => 'nullable|boolean', 
            'ig_permission' => 'nullable|boolean',
            'ig_account' => 'nullable|string|max:255',
        ]);
        
        if ($request->file('image')) { 
            $image = $request->file('image'); 
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/img'), $imageName);
        
            $experience = new ExperiencePost();
            $experience->user_id = Auth::user()->id;
            $experience->title = $request->title; 
            $experience->address = $request->address; 
            $experience->content = $request->content; 
            $experience->image_path = $imageName; 

            if ($request->has('instagrampermission')) {
                $experience->ig_permission = true;
            } else {
                $experience->ig_permission = false;
            }

            $experience->ig_account = $request->instagramaccount; 
            $experience->save();
        
            Session::flash('success', 'Image uploaded successfully.');
            return back();
        }
            return response()->json(['error' => 'No image uploaded'], 400);
        }


    // 以下投稿更新のための記述
    public function edit($id)
    {
        $experience = ExperiencePost::findOrFail($id);
        return view('experience.edit', compact('experience'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'favorite' => 'nullable|boolean', 
            'ig_permission' => 'nullable|boolean',
            'ig_account' => 'nullable|string|max:255',
        ]);
        
        $experience = ExperiencePost::findOrFail($id);
        $experience->user_id = Auth::user()->id;
        $experience->title = $request->title; 
        $experience->address = $request->address; 
        $experience->content = $request->content; 
    
        // 画像が送信された場合のみ処理
        if ($request->hasFile('image')) { 
            $image = $request->file('image'); 
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/img'), $imageName);
            $experience->image_path = $imageName;
        }
    
        if ($request->has('instagrampermission')) {
            $experience->ig_permission = true;
        } else {
            $experience->ig_permission = false;
        }
        
        $experience->ig_account = $request->instagramaccount; 
        $experience->save();
        
        return back()->with('success', '投稿が更新されました。');
    }
    

    /**

     */
//     public function destroy(string $id)
//     {
//         $experience = ExperiencePost::findOrFail($id); 
//         $experience->delete();
    
//         return redirect()->back()->with('success', '投稿が削除されました。');
//     }
// }

public function destroy(Request $request, $id)
{
    $experience = ExperiencePost::findOrFail($id); 
    $experience->delete();

    return redirect()->back()->with('success', '投稿が削除されました。');
}

    public function activityDashboard()
    {
        $events = NewsTimeLine::all();
        $newsBooking = NewsBooking::all();
        $experiences = ExperiencePost::all(); // あなたのアプリケーションに適した方法でデータを取得してください
        
        if($experiences) {
            foreach($experiences as $experience) {
                // $experience['isLike'] = 
                $likes = Like::where('user_id', Auth::user()->id)
                    ->where('experience_post_id', $experience->id)
                    ->get();
                $experience['isLike'] = count($likes) > 0 ? true : false;
            }
        }

        return view('activity-dashboard', compact('experiences', 'events', 'newsBooking'));
    }

    public function search(Request $request) 
    {
        $resultArr = array();
        $results = NewsTimeLine::whereDate('start', $request->date)->get();
        foreach($results as $item)
        {
            array_push($resultArr, $item);
        }
        return $resultArr;
    }
    
}
