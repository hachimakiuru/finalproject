<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExperienceController;
/*
|--------------------------------------------------------------------------
- Web Routes
|--------------------------------------------------------------------------
- | Here is where you can register web routes for your application. These
- routes are loaded by the RouteServiceProvider and all of them will
- be assigned to the "web" middleware group. Make something great!
- */


Route::get('/', function () {
    return view('welcome');
});

// ここのルートを変更して各自の画面を確認する
Route::get('/index', [ExperienceController::class, 'index'])->name('experience.index');

Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');


Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');

// -----------------------------------------------