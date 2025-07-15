<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('books', [BookController::class, 'getBooks']);
    Route::get('books/{id}', [BookController::class, 'getBook']);
    Route::post('books', [BookController::class, 'createBook']);
    Route::put('books/{id}', [BookController::class, 'updateBook']);
    Route::delete('books/{id}', [BookController::class, 'deleteBook']);
});

Route::get('users', [AuthController::class, 'getUsers']);
Route::post('users', [AuthController::class, 'createUser']);
Route::get('users/{id}', [AuthController::class, 'getUser']);
Route::put('users/{id}', [AuthController::class, 'updateUser']);
Route::delete('users/{id}', [AuthController::class, 'deleteUser']);