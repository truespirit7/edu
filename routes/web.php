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

Route::get('/googleauth', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('googleauth');
Route::get('/googleauth/callback', [App\Http\Controllers\Auth\LoginController::class, 'callbackGoogle']);

Route::get('/', [App\Http\Controllers\Home\IndexController::class, 'index'])->name('index');
Route::get('/category/{category}', [App\Http\Controllers\Home\IndexController::class, 'index'])->name('postsByCategory');
Route::get('/tag/{tag}', [App\Http\Controllers\Home\IndexController::class, 'indexByTag'])->name('postsByTag');

Route::get('/article/{post}', [App\Http\Controllers\Home\Post\PostController::class, 'showPost'])->name('article');
Route::get('/chatbot/', [App\Http\Controllers\Home\Chatbot\ChatbotController::class, 'openChatbot'])->name('chatbot');
//Route::post('/chatbot/messages', [App\Http\Controllers\Home\Chatbot\ChatbotController::class, 'sendMessage'])->name('send-message');
Route::post('/chatbot/messages', [App\Http\Controllers\Home\Chatbot\ChatbotController::class, 'sendMessage'])->name('send-message');
Route::get('/chatbot/messages',  [App\Http\Controllers\Home\Chatbot\ChatbotController::class, 'fetchMessages'])->name('fetch-messages');

Route::  group([ 'namespace' => 'Comment', 'prefix' => '/{post}/comments'], function () {
        Route::post('/', [App\Http\Controllers\Home\Post\CommentController::class, 'storeComment'])->name('article.comment.store');
});


Auth::routes();
Route::middleware(['role:admin'])->prefix('dashboard')->group( function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', Admin\CategoryController::class);
    Route::resource('tag', Admin\TagController::class);
    Route::resource('test', Admin\TestController::class);

    // Route::get('/post/category', [Admin\PostController::class, 'index']);
    Route::resource('post', Admin\PostController::class);


});
