<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/user/{username}', [\App\Http\Controllers\ProfileController::class, 'getProfile'])
    ->name('profile.index');

/* Посты */

Route::get('/user/like/{id}', [\App\Http\Controllers\PostController::class, 'like'])
    ->middleware('auth')->name('like');
Route::get('/user/unlike/{id}', [\App\Http\Controllers\PostController::class, 'unlike'])
    ->middleware('auth')->name('unlike');
Route::get('/user/dislike/{id}', [\App\Http\Controllers\PostController::class, 'dislike'])
    ->middleware('auth')->name('dislike');
Route::get('/user/undislike/{id}', [\App\Http\Controllers\PostController::class, 'undislike'])
    ->middleware('auth')->name('undislike');
Route::get('/profile', [\App\Http\Controllers\PostController::class, 'allPosts'])
    ->middleware('auth')->name('profile');
Route::post('/profile/add-post', [\App\Http\Controllers\PostController::class, 'addPost'])
    ->middleware('auth')->name('addPost');
Route::post('/profile/add-comment', [\App\Http\Controllers\PostController::class, 'addComment'])
    ->middleware('auth')->name('addComment');

/* Авторизация */

Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'getSignup'])
    ->middleware('guest')->name('auth.signup');
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'postSignup'])
    ->middleware('guest');

Route::get('/signin', [\App\Http\Controllers\AuthController::class, 'getSignin'])
    ->middleware('guest')->name('auth.signin');
Route::post('/signin', [\App\Http\Controllers\AuthController::class, 'postSignin'])
    ->middleware('guest');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware('auth')->name('auth.logout');
