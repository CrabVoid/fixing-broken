<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('index');
Route::get('/books/create', [BookController::class, 'create'])->name('create');
Route::post('/books/store', [BookController::class, 'store'])->name('store');
Route::get('/books/{id}', [BookController::class, 'show'])->name('show');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit');
Route::put('/books/{id}/update', [BookController::class, 'update'])->name('update');