<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\UserController;

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

Route::apiResource('users', UserController::class)->only(['index', 'show', 'store', 'update', 'destroy']);