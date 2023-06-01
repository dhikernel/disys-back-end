<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domain\Client\Controllers\ClientController;
use App\Domain\Order\Controllers\OrderController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/list-clients', [ClientController::class, 'index']);

    Route::post('/create-client', [ClientController::class, 'store']);

    Route::put('/update-client/{id}', [ClientController::class, 'update']);

    Route::delete('/delete-client/{id}', [ClientController::class, 'destroy']);

    Route::get('/list-orders', [OrderController::class, 'index']);

    Route::post('/create-order', [OrderController::class, 'store']);

    Route::put('/update-order/{id}', [OrderController::class, 'update']);

    Route::delete('/delete-order/{id}', [OrderController::class, 'destroy']);
