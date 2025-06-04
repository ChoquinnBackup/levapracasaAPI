<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

Route::post( '/register', [AuthController::class , 'register']);
Route::post( '/login', [AuthController::class , 'login']);

Route::middleware(['api', \Illuminate\Session\Middleware\StartSession::class])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('items', ItemController::class);
    Route::post('/categorias', [CategoriaController::class, 'store']);
});

