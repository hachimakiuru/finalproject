<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// ここのルートを変更して各自の画面を確認する
Route::get('/layout', function () {
    return view('layouts.layout');
});

// -----------------------------------------------

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
//     Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
// });

Route::get('/users', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);


Route::delete('/admin/dashboard/{user}', [UserController::class, 'destroy'])->name('user.destroy');
