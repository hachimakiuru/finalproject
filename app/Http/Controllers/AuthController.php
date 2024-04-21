<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as ModelsRole;

class AuthController extends Controller
{
    public function register()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function store()
    {
        $valideaed = request()->validate(
            [
                'name' => 'required|min:5|max:40',
                'email' => 'required|email|unique:users,email',
                'room_number' => 'nullable',
                'role_id' => 'required|exists:roles,id',
                'password' => 'required|confirmed|min:8'
            ]
        );

        User::create(
            [
                'name' => $valideaed['name'],
                'email' => $valideaed['email'],
                'room_number' => $valideaed['room_number'],
                // 'role' => Role::find($valideaed['role']),
                'role_id' => $valideaed['role_id'],
                'password' => Hash::make($valideaed['password']),
            ]
        );

        return redirect()->route('welcome')->with('success', 'アカウント追加が完了しました！');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        // dd(request()->all());
        $valideaed = request()->validate(
            [
                'email' => 'required|email',
                'room_number' => 'required',
                'password' => 'required|min:8'
            ]
        );

        if (auth()->attempt($valideaed)) {
            request()->session()->regenerate();
            return redirect()->route('welcome')->with('success', 'ログインが完了しました!');;

            // return redirect()->route('/')->
        }

        return redirect('login')->withErrors([
            'email'  => "入力された情報全てにマッチするアカウントはありませんでした。"
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login')->with('success', "ログアウトしました。");
    }
}
