<?php

use App\Http\Controllers\ShortUrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/shorten', [ShortUrlController::class, 'store']);
Route::get('/shorten/{code}', [ShortUrlController::class, 'show']);
Route::put('/shorten/{code}', [ShortUrlController::class, 'update']);
Route::delete('/shorten/{code}', [ShortUrlController::class, 'destroy']);
Route::get('/shorten/{code}/stats', [ShortUrlController::class, 'stats']);
