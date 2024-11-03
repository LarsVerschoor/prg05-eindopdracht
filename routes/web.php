<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::put('/posts/{id}/visibility', [PostController::class, 'visibility'])->name('posts.visibility');
    Route::get('/posts/search', [SearchController::class, 'index'])->name('posts.search');
    Route::get('/posts/admin', [PostController::class, 'adminIndex'])->name('posts.admin.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/posts', PostController::class);
    Route::get('/posts/{post}/image', [PostController::class, 'showImage'])->name('posts.images.show');
    Route::post('/posts/{post}/like', [PostController::class, 'storeLike'])->name('posts.likes.store');
    Route::delete('/posts/{post}/like', [PostController::class, 'destroyLike'])->name('posts.likes.destroy');
    Route::resource('/cars', CarController::class);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

require __DIR__.'/auth.php';
