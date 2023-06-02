<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Domain\Client\Controllers\ClientController;
use App\Domain\Order\Controllers\OrderController;
use App\Domain\Product\Controllers\ProductController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

    Route::prefix('auth')->group(function () {

        Route::get('/user', [LoginController::class, 'user'])->middleware('auth:sanctum');

        Route::post('/login', [LoginController::class, 'login']);

        Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

        Route::post('/register', [RegisterController::class, 'register']);

    });

    Route::prefix('clients')->group(function () {

        Route::get('/list', [ClientController::class, 'index'])->middleware('auth:sanctum');

        Route::post('/create', [ClientController::class, 'store'])->middleware('auth:sanctum');

        Route::put('/update/{id}', [ClientController::class, 'update'])->middleware('auth:sanctum');

        Route::delete('/delete/{id}', [ClientController::class, 'destroy'])->middleware('auth:sanctum');
    });

    Route::prefix('orders')->group(function () {

        Route::get('/list', [OrderController::class, 'index'])->middleware('auth:sanctum');

        Route::post('/create', [OrderController::class, 'store'])->middleware('auth:sanctum');

        Route::put('/update/{id}', [OrderController::class, 'update'])->middleware('auth:sanctum');

        Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->middleware('auth:sanctum');

    });

    Route::prefix('products')->group(function () {

        Route::get('/list', [ProductController::class, 'index'])->middleware('auth:sanctum');

        Route::post('/create', [ProductController::class, 'store'])->middleware('auth:sanctum');

        Route::put('/update/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');

        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum');

    });
