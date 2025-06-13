<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/books', function () {
    return view('books.index');
})->middleware(['auth', 'verified'])->name('books');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('index');
    Route::get('/books/create', [BookController::class, 'create'])->name('create');
    Route::post('/books/store', [BookController::class, 'store'])->name('store');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('show');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('update');
});

require __DIR__.'/auth.php';
