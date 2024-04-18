<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantDashboardController;
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
// -----------------------------------------------


//restaurant-dashboard
Route::get('/restaurant-dashboard', [RestaurantDashboardController::class, 'index'])->name('restaurant.dashboard');

// restaurant-search

// リスト表示
Route::get('/restaurant-index', [RestaurantPostController::class, 'index'])->name('restaurant.index');

// 新規作成フォームの表示
Route::get('/restaurant-index/create', [RestaurantPostController::class, 'create'])->name('restaurant.create');

// 新規作成フォームの送信
Route::post('/restaurant-posts', [RestaurantPostController::class, 'store'])->name('restaurant-posts.store');

// 特定の投稿の表示
Route::get('/restaurant-posts/{id}', [RestaurantPostController::class, 'show'])->name('restaurant-posts.show');

// 編集フォームの表示
Route::get('/restaurant-posts/{id}/edit', [RestaurantPostController::class, 'edit'])->name('restaurant-posts.edit');

// 編集フォームの送信
Route::put('/restaurant-posts/{id}', [RestaurantPostController::class, 'update'])->name('restaurant-posts.update');

// 削除
Route::delete('/restaurant-posts/{id}', [RestaurantPostController::class, 'destroy'])->name('restaurant-posts.destroy');



