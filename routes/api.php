<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [AuthController::class, 'register']);

Route::get('books', [AuthController::class, 'getBooks'])->middleware('auth:api');
Route::get('books/{id}', [AuthController::class, 'getBook'])->middleware('auth:api');
Route::post('books', [AuthController::class, 'createBook'])->middleware('auth:api');
Route::put('books/{id}', [AuthController::class, 'updateBook'])->middleware('auth:api');
Route::delete('books/{id}', [AuthController::class, 'deleteBook'])->middleware('auth:api');

Route::get('users', [AuthController::class, 'getUsers'])->middleware('auth:api');
Route::post('users', [AuthController::class, 'createUser'])->middleware('auth:api');
Route::get('users/{id}', [AuthController::class, 'getUser'])->middleware('auth:api');
Route::put('users/{id}', [AuthController::class, 'updateUser'])->middleware('auth:api');
Route::delete('users/{id}', [AuthController::class, 'deleteUser'])->middleware('auth:api');