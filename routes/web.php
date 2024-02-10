<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// frontend routes
Route::get('/', [FrontendController::class, 'home'])->name('front.home');
Route::get('/about', [FrontendController::class, 'about'])->name('front.about');
Route::get('/list', [FrontendController::class, 'list'])->name('front.list');
// frotnednroutes end
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('cart', CartController::class);
    Route::get('/checkout', [FrontendController::class, 'checkout'])->name('user.checkout');
});

Route::middleware('auth')->as('admin.')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', UserController::class);
});
