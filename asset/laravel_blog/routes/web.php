<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome']
)->name('welcome');
Route::get('/category/{id}', [WelcomeController::class, 'welcomecategory']
)->name('welcomecategory');


Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/mentions-legales', [LegalController::class, 'legal'])->name('legal');



Route::get('/create', PostController::class .'@create')->name('create');
Route::post('/posts', PostController::class .'@store')->name('posts.store');
Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');



Route::group(['middleware' => EnsureTokenIsValid::class],function () {
    Route::put('/category/{id}/edit', CategoryController::class .'@categoryupdate')->name('categoryupdate');
    Route::get('/category/{id}/edit', CategoryController::class .'@categoryedit')->name('categoryedit');
    Route::delete('/category/{id}', CategoryController::class .'@categorydestroy')->name('categorydestroy');
    Route::get('/category',[CategoryController::class, 'category'])->name('category');
    Route::post('/category', CategoryController::class .'@store')->name('categories');
});

Route::group(['middleware' => EnsureTokenIsValid::class],function () {
Route::get('/user', UserController::class .'@user')->name('user');
Route::get('/user/{id}', UserController::class .'@show')->name('user.show');
Route::delete('/user/{id}', UserController::class .'@destroy')->name('userdestroy');
Route::put('/user/{id}/edit', UserController::class .'@update')->name('userupdate');
});



require __DIR__.'/auth.php';
