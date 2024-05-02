<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'room_number' => 'nullable|integer',
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:8', // パスワードは空でも許可する
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'room_number' => $request->room_number,
            'role_id' => $request->role_id,
            'password' => $request->password,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.dashboard')->with('success', "You have successfully changed user's information");
    }

    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'This user account has been successfully deleted');
    }
}
