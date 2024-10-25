<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', PostController::class)->middleware('auth');
    Route::get('/posts/{post}/image', [PostController::class, 'showImage'])->name('posts.images.show');
});

//Route::resource('posts', PostController::class);

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware(['auth']);
//Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(['auth']);
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
//Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

require __DIR__.'/auth.php';
