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

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

/* Авторизация */

Route::get('/signup', [\App\Http\Controllers\AuthController::class, 'getSignup'])->middleware('guest')->name('auth.signup');
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'postSignup'])->middleware('guest');

Route::get('/signin', [\App\Http\Controllers\AuthController::class, 'getSignin'])->middleware('guest')->name('auth.signin');
Route::post('/signin', [\App\Http\Controllers\AuthController::class, 'postSignin'])->middleware('guest');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');
