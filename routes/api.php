<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [AuthController::class, 'register']);

Route::get('books', [BookController::class, 'getBooks'])->middleware('auth:api');
Route::get('books/{id}', [BookController::class, 'getBook'])->middleware('auth:api');
Route::post('books', [BookController::class, 'createBook'])->middleware('auth:api');
Route::put('books/{id}', [BookController::class, 'updateBook'])->middleware('auth:api');
Route::delete('books/{id}', [BookController::class, 'deleteBook'])->middleware('auth:api');

Route::get('users', [AuthController::class, 'getUsers'])->middleware('auth:api');
Route::post('users', [AuthController::class, 'createUser'])->middleware('auth:api');
Route::get('users/{id}', [AuthController::class, 'getUser'])->middleware('auth:api');
Route::put('users/{id}', [AuthController::class, 'updateUser'])->middleware('auth:api');
Route::delete('users/{id}', [AuthController::class, 'deleteUser'])->middleware('auth:api');