<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantPostController;





use App\Http\Controllers\AuthController;


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

Route::get('/restaurant-dashboard', function () {
    return view('restaurant-dashboard');
});
// -----------------------------------------------



//news Route
Route::get('/news', [NewsController::class,'index'])->name('news.index');




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


// restaurant-haruki
Route::get('/restaurants', [App\Http\Controllers\RestaurantPostController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/create', [App\Http\Controllers\RestaurantPostController::class, 'create'])->name('restaurants.create');
Route::post('/restaurants', [App\Http\Controllers\RestaurantPostController::class, 'store'])->name('restaurants.store');
Route::get('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantPostController::class, 'show'])->name('restaurants.show');
Route::get('/restaurants/{restaurant}/edit', [App\Http\Controllers\RestaurantPostController::class, 'edit'])->name('restaurants.edit');
Route::put('/restaurants/{restaurant}/update', [App\Http\Controllers\RestaurantPostController::class, 'update'])->name('restaurants.update');
Route::delete('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantPostController::class, 'destroy'])->name('restaurants.destroy');


// experience
Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');

// いいね機能
Route::post('/like/{postId}',[LikeController::class,'store'])->name('like.store');
Route::delete('/unlike/{postId}',[LikeController::class,'destroy'])->name('like.destroy');


