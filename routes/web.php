<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantPostController;


use App\Http\Controllers\RestaurantDashboardController;
use App\Http\Controllers\NewsController;


use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;


use App\Http\Controllers\ExperienceController;

use App\Http\Controllers\LikeController;

use App\Http\Controllers\NewsBookingController;

use App\Http\Controllers\RbookingController;

use App\Http\Controllers\RestaurantLikeController;
use App\Http\Controllers\RestaurantCommentsController;

use App\Http\Controllers\NewsCalendarController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// ここのルートを変更して各自の画面を確認する


Route::get('/activity-dashboard', function () {
    return view('activity-dashboard');
})->name('activity.dashboard');



//News.index
Route::get('/news/event', [NewsController::class, 'event'])->name('news.event');
Route::get('/news/hotel-info', [NewsController::class, 'hotelInfo'])->name('news.hotel-info');
Route::get('/news/japan-culture', [NewsController::class, 'japanCulture'])->name('news.japan-culture');
Route::get('/news/others', [NewsController::class, 'others'])->name('news.others');

//News.Modalのstore
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
//News.show
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
//News.edit
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.news-edit');

Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');

Route::delete('posts/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

Route::get('/restaurant-dashboard', function () {
    return view('restaurant-dashboard');
});


// ログイン・ログアウト・レジスター・
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// admin.dashboardのルート
Route::get('/admin', [UserController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);
Route::get('/admin/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/admin/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// --------------------------------------------------------------

// ポンポン投稿
Route::get('/index', [ExperienceController::class, 'index'])->name('experience.index');

Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');


Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');


// restaurant-haruki
Route::get('/restaurants', [App\Http\Controllers\RestaurantPostController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/create', [App\Http\Controllers\RestaurantPostController::class, 'create'])->name('restaurants.create');
Route::post('/restaurants', [App\Http\Controllers\RestaurantPostController::class, 'store'])->name('restaurants.store');
Route::get('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantPostController::class, 'show'])->name('restaurants.show');
Route::get('/restaurants/{restaurant}/edit', [App\Http\Controllers\RestaurantPostController::class, 'edit'])->name('restaurants.edit');
Route::put('/restaurants/{restaurant}/update', [App\Http\Controllers\RestaurantPostController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantPostController::class, 'destroy'])->name('restaurants.destroy');

Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');

// restaurant-booking-form
Route::get('/rbooking', [RbookingController::class, 'index'])->name('rbooking.index');
Route::put('/rbooking/{id}', [RbookingController::class, 'update'])->name('rbooking.update');
Route::delete('/rbooking/{id}', [RbookingController::class, 'destroy'])->name('rbooking.destroy');
Route::post('/rbooking', [RbookingController::class, 'store'])->name('rbooking.store');


// News Bookings一覧
Route::get('/news-bookings', [NewsBookingController::class, 'index'])->name('newsBookings.index');
Route::put('/news-bookings/{id}', [RbookingController::class, 'update'])->name('newsBooking.update');
Route::delete('/news-bookings/{id}', [NewsBookingController::class, 'destroy'])->name('newsBookings.destroy');


// いいね機能
Route::post('/like/{postId}', [LikeController::class, 'store'])->name('like.store');
Route::delete('/unlike/{postId}', [LikeController::class, 'destroy'])->name('like.destroy');


// いいね機能(restaurant)
Route::post('/restaurant/like/{postId}', [RestaurantLikeController::class, 'store'])->name('resto-like.store');
Route::delete('/restaurant/unlike/{postId}', [RestaurantLikeController::class, 'destroy'])->name('resto-like.destroy');



Route::get('/calendar', [NewsCalendarController::class, 'view'])->name('calendar.view');
Route::get('/calendar/search', [NewsCalendarController::class, 'search'])->name('calendar.search');

Route::prefix('comments')->group(function () {
    Route::post('/', [RestaurantCommentsController::class, 'store'])->name('restaurant_comments.store');
    Route::put('/{restaurantComment}', [RestaurantCommentsController::class, 'update'])->name('comments.update');
    Route::delete('/{restaurantComment}', [RestaurantCommentsController::class, 'destroy'])->name('comments.destroy');
});

