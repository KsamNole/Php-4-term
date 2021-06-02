<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/profile', [\App\Http\Controllers\PostController::class, 'allPosts'])
    ->middleware('auth')->name('profile');
Route::get('/user/{username}', [\App\Http\Controllers\ProfileController::class, 'getProfile'])
    ->name('profile.index');

/* Сообщения */

Route::post('/profile/add-message', [\App\Http\Controllers\ProfileController::class, 'sendMessage'])
    ->middleware('auth')->name('sendMessage');
Route::get('/messages', [\App\Http\Controllers\ProfileController::class, 'getMessages'])
    ->middleware('auth')->name('messages');
Route::get('/messages/{username}', [\App\Http\Controllers\ProfileController::class, 'chat'])
    ->middleware('auth')->name('chat');
Route::get('/update-msg', [\App\Http\Controllers\ProfileController::class, 'updateMessages'])
    ->middleware('auth')->name('update-msg');
Route::get('/update-chat/{username}', [\App\Http\Controllers\ProfileController::class, 'updateChat'])
    ->middleware('auth')->name('update-chat');

/* Посты */

Route::get('/post/like', [\App\Http\Controllers\PostController::class, 'like'])
    ->middleware('auth')->name('like');
Route::get('/post/dislike', [\App\Http\Controllers\PostController::class, 'dislike'])
    ->middleware('auth')->name('dislike');

Route::post('/profile/add-post', [\App\Http\Controllers\PostController::class, 'addPost'])
    ->middleware('auth')->name('addPost');
Route::post('/profile/add-comment', [\App\Http\Controllers\PostController::class, 'addComment'])
    ->middleware('auth')->name('addComment');

Route::get('/update-posts', [\App\Http\Controllers\PostController::class, 'updatePosts'])
    ->middleware('auth')->name('update-posts');

/* Удаление постов, комментариев, страниц */

Route::get('/profile/delete-post', [\App\Http\Controllers\PostController::class, 'deletePost'])
    ->middleware('auth');

Route::get('/profile/delete-comment', [\App\Http\Controllers\PostController::class, 'deleteComment'])
    ->middleware('auth');

Route::get('/profile/delete-page', [\App\Http\Controllers\ProfileController::class, 'deletePage'])
    ->middleware('auth');

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

/* Загрузка фото профиля */

Route::post("/image-upload", [\App\Http\Controllers\UploadController::class, 'upload'])
    ->middleware('auth')->name("image.upload");

Route::get("/upload-page", [\App\Http\Controllers\UploadController::class, 'page'])
    ->middleware('auth')->name("upload.page");
