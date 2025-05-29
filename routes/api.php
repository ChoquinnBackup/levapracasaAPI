<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

Route::post( '/register', [AuthController::class , 'register']);
Route::post( '/login', [AuthController::class , 'login']);

Route::middleware(['api', \Illuminate\Session\Middleware\StartSession::class])->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


