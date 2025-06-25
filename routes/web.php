<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('show.register');
    Route::get('/login', 'showLoginForm')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->controller(BookController::class)->group(function () {
    Route::get('/myshelf', 'index')->name('books.index');
    Route::get('/show/{id}', 'show')->name('books.show');
    Route::get('/add', 'add')->name('books.add');
    Route::post('/myshelf', 'store')->name('books.store');
    Route::get('/edit/{id}', 'edit')->name('books.edit');
    Route::put('/books/{id}', 'update')->name('books.update');
    Route::delete('/books/{id}', 'destroy')->name('books.destroy');
});
