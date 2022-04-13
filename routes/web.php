<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;



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

Route::get('/redirecttogoogle', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogleoogle']);
Route::get('/callbackgoogle', [App\Http\Controllers\Auth\LoginController::class, 'callbackGoogle']);
Route::get('/regOrLogin', [App\Http\Controllers\Auth\LoginController::class, 'regOrLogin']);

Route::get('/', [App\Http\Controllers\Home\IndexController::class, 'index'])->name('index');
Route::get('/category/{category}', [App\Http\Controllers\Home\IndexController::class, 'index'])->name('postsByCategory');

Route::get('/article/{post}', [App\Http\Controllers\Home\PostController::class, 'showPost'])->name('article');
Auth::routes();
Route::middleware(['role:admin'])->prefix('dashboard')->group( function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', Admin\CategoryController::class);

   // Route::get('/post/category', [Admin\PostController::class, 'index']);
    Route::resource('post', Admin\PostController::class);


});
