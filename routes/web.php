<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*pertemuan 5 dan 6 */
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\SetLocale;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome'); 
    return redirect()->route('posts.index'); 
});

//Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

 Route::resource('posts', PostController::class);
/*Route::get('/posts', function () {
    return view('posts/index');
});*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::resource('posts', PostController::class)->middleware(AuthCheck::class);

Route::resource('transaksi', TransaksiController::class);
//Route::resource('transaksi', TransaksiController::class)->middleware('authcheck');

//Protected routes using 'authcheck' middleware
Route::middleware('authcheck')->group(function() {
    Route::resource('posts', PostController::class)->middleware(AuthCheck::class);
    Route::resource('transaksi', TransaksiController::class);
});

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang');

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', function () {
        return redirect()->route('posts.index'); 
    });
    Route::resource('posts', PostController::class);
});
