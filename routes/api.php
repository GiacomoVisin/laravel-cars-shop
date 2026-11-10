<?php

use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotte pubbliche per le auto
Route::get('/cars', [CarsController::class, 'index']);
Route::get('/cars/{car}', [CarsController::class, 'show']);

// Rotta per il login API
Route::post('/login', [AuthController::class, 'login']);

// Rotte protette da Sanctum (richiedono il token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/cars', [CarsController::class, 'store']);