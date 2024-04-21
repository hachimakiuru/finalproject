<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantPostController;


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
Route::get('/restaurant-dashboard', function () {
    return view('restaurant-dashboard');
});
// -----------------------------------------------


// restaurant-haruki
Route::get('/restaurants', [App\Http\Controllers\RestaurantPostController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/create', [App\Http\Controllers\RestaurantPostController::class, 'create'])->name('restaurants.create');
Route::post('/restaurants', [App\Http\Controllers\RestaurantPostController::class, 'store'])->name('restaurants.store');
Route::get('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantPostController::class, 'show'])->name('restaurants.show');
Route::get('/restaurants/{restaurant}/edit', [App\Http\Controllers\RestaurantPostController::class, 'edit'])->name('restaurants.edit');
Route::put('/restaurants/{restaurant}/update', [App\Http\Controllers\RestaurantPostController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantPostController::class, 'destroy'])->name('restaurants.destroy');

