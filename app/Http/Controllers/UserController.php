<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;




class UserController extends Controller
{
    public function index(Request $request)
    {
        // $roles = Role::all();
        // $users = User::all();
        // return view('admin.dashboard', compact('roles', 'users'));

        $roles = Role::all();
        $selectedRole = $request->input('role');

        // 選択された役割によるユーザーのフィルタリング
        $users = User::query();
        if ($selectedRole) {
            $users->where('role_id', $selectedRole);
        }
        $users = $users->get();

        return view('admin.dashboard', compact('roles', 'users', 'selectedRole'));
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'room_number' => 'nullable|integer|min:100',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'room_number' => $request->room_number,
            'role_id' => $request->role_id,
        ]);

        // return redirect()->route('user.edit', $user->id)->with('success', 'ユーザー情報が更新されました。');
        return redirect()->route('admin.dashboard')->with('success', 'ユーザー情報が更新されました。');
    }

    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'ユーザーの削除が完了しました。');
    }
}
