<?php

use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Api\AuthController;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotte pubbliche per le auto, brand e tipi
Route::get('/cars', [CarsController::class, 'index']);
Route::get('/cars/{car}', [CarsController::class, 'show']);

Route::get('/brands', function () {
    return response()->json([
        'data' => Brand::all()
    ]);
});

Route::get('/types', function () {
    return response()->json([
        'data' => Type::all()
    ]);
});

// Rotta per il login API
Route::post('/login', [AuthController::class, 'login']);

// Rotta per la creazione dell'auto
Route::post('/cars', [CarsController::class, 'store']);

// Rotte protette da Sanctum (richiedono il token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::delete('/cars/{car}', [CarsController::class, 'destroy']);
});