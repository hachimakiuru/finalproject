<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestaurantDashboardController;
use App\Http\Controllers\NewsController;


use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;


use App\Http\Controllers\ExperienceController;

use App\Http\Controllers\LikeController;


/*
|--------------------------------------------------------------------------
- Web Routes
|--------------------------------------------------------------------------
- | Here is where you can register web routes for your application. These
- routes are loaded by the RouteServiceProvider and all of them will
- be assigned to the "web" middleware group. Make something great!
- */


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// ここのルートを変更して各自の画面を確認する


Route::get('/activity-dashboard', function () {
    return view('activity-dashboard');
});


//News.index
Route::get('/news/event', [NewsController::class,'event'])->name('news.event');
Route::get('/news/hotel-info', [NewsController::class,'hotelInfo'])->name('news.hotel-info');
Route::get('/news/japan-culture', [NewsController::class,'japanCulture'])->name('news.japan-culture');
Route::get('/news/others', [NewsController::class,'others'])->name('news.others');

//News.Modalのstore
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
//News.show
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
//News.edit
Route::get('/news/{id}/edit',[NewsController::class,'edit'])->name('news.news-edit');

Route::put('/news/{id}',[NewsController::class,'update'])->name('news.update');

Route::delete('posts/{id}',[NewsController::class,'destroy'])->name('news.destroy');




// ログイン・ログアウト・レジスター・
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/users', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);

Route::delete('/admin/dashboard/{user}', [UserController::class, 'destroy'])->name('user.destroy');
// --------------------------------------------------------------

// ポンポン投稿
Route::get('/index', [ExperienceController::class, 'index'])->name('experience.index');

Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');


Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');

// いいね機能
Route::post('/like/{postId}',[LikeController::class,'store']);
Route::post('/unlike/{postId}',[LikeController::class,'destroy']);

