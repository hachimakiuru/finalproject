<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// ここのルートを変更して各自の画面を確認する
Route::get('/index', function () {
    return view('experience.index');
});

use App\Http\Controllers\ExperienceController;

Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');

// -----------------------------------------------