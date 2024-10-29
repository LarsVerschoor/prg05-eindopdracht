<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/posts', PostController::class)->middleware('auth');
    Route::get('/posts/{post}/image', [PostController::class, 'showImage'])->name('posts.images.show');
    Route::post('/posts/{post}/like', [PostController::class, 'storeLike'])->name('posts.likes.store');
    Route::delete('/posts/{post}/like', [PostController::class, 'destroyLike'])->name('posts.likes.destroy');
});

require __DIR__.'/auth.php';
