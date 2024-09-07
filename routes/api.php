<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;

Route::get('/genre', [GenreController::class, 'index']);
Route::post('/genre', [GenreController::class, 'store']);
Route::get('/genre/{genre}', [GenreController::class, 'show']);
Route::put('/genre/{genre}', [GenreController::class, 'update']);
Route::delete('/genre/{genre}', [GenreController::class, 'destroy']);

Route::get('/film', [FilmController::class, 'index']);
Route::post('/film', [FilmController::class, 'store']);
Route::get('/film/{film}', [FilmController::class, 'show']);
Route::put('/film/{film}', [FilmController::class, 'update']);
Route::delete('/film/{film}', [FilmController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
