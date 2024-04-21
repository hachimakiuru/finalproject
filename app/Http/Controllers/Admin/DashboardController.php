<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
        // $this->authorize('admin');
        // if (Gate::denies('admin')) {
        //     abort(403);
        // }

        // return view('admin.dashboard');
    }
}
