<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myshelf', [BookController::class, 'index'])->name('books.index');
Route::get('/show/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/add', [BookController::class, 'add'])->name('books.add');
Route::post('/store', [BookController::class, 'store'])->name('books.store');