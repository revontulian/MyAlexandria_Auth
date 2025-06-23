<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/myshelf', [BookController::class, 'index'])->name('books.index');
Route::get('/show/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/add', [BookController::class, 'add'])->name('books.add');
Route::post('/myshelf', [BookController::class, 'store'])->name('books.store');
Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');