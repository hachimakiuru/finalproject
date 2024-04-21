<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{



    public function destroy(User $user)
    {
        // dd($user->id);
        // $user = User::find(id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'ユーザーの削除が完了しました。');
    }
}
