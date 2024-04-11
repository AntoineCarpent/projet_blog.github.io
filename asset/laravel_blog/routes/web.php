<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome']
)->name('welcome');


Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/mentions-legales', [LegalController::class, 'legal'])->name('legal');

Route::get('/posts/create', PostController::class . '@create')->name('posts/create');

Route::post('/posts', PostController::class .'@store')->name('posts.store');

Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');

Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');

Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');

Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');


require __DIR__.'/auth.php';
