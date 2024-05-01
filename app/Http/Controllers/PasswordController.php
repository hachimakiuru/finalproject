<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangeForm()
    {
        return view('auth.password_change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // 現在のパスワードが正しいかどうかを確認
        if (Hash::check($request->current_password, $user->password)) {
            // 新しいパスワードをハッシュ化して更新
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    }
}
