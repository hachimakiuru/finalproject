<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperiencePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



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
            // $experience->user_id = Auth::user()->id;
            $experience->title = $request->title; 
            $experience->address = $request->address; 
            $experience->content = $request->content; 
            $experience->image_path = $imageName; 
            if ($request->has('instagram_permission')) {
                $experience->ig_permission = true;
            }
            $experience->ig_account = $request->instagram_account; 
            $experience->save();
        
            Session::flash('success', 'Image uploaded successfully.');
            return redirect()->route('experience.index');
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
        $experience = ExperiencePost::findOrFail($id); 
        $experience->delete();
    
        return redirect()->back()->with('success', '投稿が削除されました。');
    }
}