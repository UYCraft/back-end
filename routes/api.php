<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// URL Terbuka (Bisa diakses tanpa login)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// URL Tertutup (Harus login dulu / bawa Token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Cek user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
