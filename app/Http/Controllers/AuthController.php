<?php

namespace App\Http\Controllers;

use App\Models\ChFavorite;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = User::orderBy('id', 'DESC')->first();



        ChFavorite::create([
            'user_id' => $user->id,
            'favorite_id' => 1,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Account has been created successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $valideaed = request()->validate(
            [
                'email' => 'required|email',
                'room_number' => 'required',
                'password' => 'required|min:8'
            ]
        );

        if (auth()->attempt($valideaed)) {
            // ユーザーがログインした場合の処理
            $user = Auth::user();
            $user->increment('login_count');

            if ($user->login_count == 1) {
                // ログイン回数が1の場合はパスワード変更ページにリダイレクト
                return redirect()->route('password.change.form');
            }

            request()->session()->regenerate();
            return redirect()->route('welcome')->with('success', 'You have been logged in successfully.');;
        }

        return redirect('login')->withErrors([
            'email'  => "No account matching all the provided information was found."
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login')->with('success', "You have been logged out.");
    }
}
