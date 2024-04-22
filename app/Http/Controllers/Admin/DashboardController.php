<?php

// namespace App\Http\Controllers\Admin;

// use UserController;
// use App\Models\User;
// use App\Http\Controllers\Controller;
// use App\Models\Role;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Log;

// class DashboardController extends Controller
// {
//     public function index(User $user)
//     {
//         $users = User::all();
//         $roles = Role::all();
//         return view('admin.dashboard', compact('roles', 'users'));
        // $this->authorize('admin');
        // if (Gate::denies('admin')) {
        //     abort(403);
        // }

        // return view('admin.dashboard');
//     }
// }
