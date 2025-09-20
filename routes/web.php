<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SettingController;

Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

// Route untuk menangani Login, Register, dan Logout
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('login.authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register',  'store')->name('register.store');
    });
    Route::post('/logout', 'logout')->name('logout');
});


// Route untuk handle category
Route::prefix('categories')->middleware(['auth'])->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('categories');
    Route::get('/create', 'create')->name('categories.create');
    Route::post('/', 'store')->name('categories.store');
    Route::get('/{category}/edit', 'edit')->name('categories.edit');
    Route::put('/{category}', 'update')->name('categories.update');
    Route::delete('/{category}', 'destroy');
});


// Route untuk handle posts
Route::prefix('posts')->middleware('auth')->controller(PostController::class)->group(function () {
    Route::get('/',  'index')->name('posts');
    Route::get('/create',  'create')->name('posts.create');
    Route::post('/', 'store')->name('posts.store');
    Route::get('/{post}', 'show')->name('posts.show');
    Route::get('/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/{post}', 'update')->name('posts.update');
    Route::delete('/{post}', 'destroy');
});


// Route untuk handle users
Route::prefix('users')->middleware(['auth'])->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users');
    Route::get('/create', 'create')->name('users.create');
    Route::post('/', 'store')->name('users.store');
    Route::get('/{user}', 'show')->name('users.show');
    Route::get('/{user}/edit', 'edit')->name('users.edit');
    Route::put('/{user}', 'update')->name('users.update');
    Route::delete('/{user}', 'destroy')->name('users.destroy');
    Route::get('/{user}/password', 'editPassword')->name('user.editPassword');
    Route::put('/{user}/updatePassword', 'updatePassword')->name('users.updatePassword');
});

Route::prefix('settings')->middleware('auth')->controller(SettingController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/profile', 'edit');
    Route::put('/update-profile', 'update');
});
