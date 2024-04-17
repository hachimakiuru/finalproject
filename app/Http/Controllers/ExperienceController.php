<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperiencePost; 


class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = ExperiencePost::all(); // あなたのアプリケーションに適した方法でデータを取得してください
        return view('experience.index', compact('experiences'));
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
            $request->validate([
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max file size as needed
            ]);
    
            if ($request->file('image_path')) {
                $image = $request->file('image_path');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('storage/img'), $imageName);
    
                $experience = new ExperiencePost(); // Experience を ExperiencePost に変更
                $experience->image_path = $imageName; // image を image_path に変更
                // You might want to associate other data with the post as well
                $experience->save();
    
                Session::flash('success', 'Image uploaded successfully.');
                return redirect()->route('show');
            }
    
            return response()->json(['error' => 'No image uploaded'], 400);
        }
    
    


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
        $experience = ExperiencePost::findOrFail($id); // ExperiencePost モデルを使用するように修正
        $experience->delete();
    
        return redirect()->back()->with('success', '投稿が削除されました。');
    }
}
