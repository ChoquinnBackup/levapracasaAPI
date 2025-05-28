<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

Route::post( '/register', [AuthController::class , 'register']);
Route::post( '/login', [AuthController::class , 'login']);

Route::middleware(['web', 'auto.reconnect'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/items', [ItemController::class, 'listitems']);
    Route::get('/items/{id}', [ItemController::class, 'item']);
    Route::get('/categories/{type}', [ItemController::class, 'categories']);
});

