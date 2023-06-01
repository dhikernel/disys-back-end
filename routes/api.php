<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domain\Client\Controllers\ClientController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/list-clients', [ClientController::class, 'index']);

    Route::post('/create', [ClientController::class, 'store']);

    Route::put('/update/{id}', [ClientController::class, 'update']);

    Route::delete('/delete/{id}', [ClientController::class, 'destroy']);
