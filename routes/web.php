<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantDashboardController;

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
// Route::get('/layout', function () {
//     return view('layouts.layout');
// });

Route::get('/news-dashboard', function () {
    return view('news-dashboard');
});
Route::get('/activity-dashboard', function () {
    return view('activity-dashboard');
});
// -----------------------------------------------


//restaurants Route
Route::get('/restaurant-dashboard', [RestaurantDashboardController::class, 'index'])->name('restaurant.dashboard');


