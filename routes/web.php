<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;


Route::get('/', [GameController::class, 'index'])->name('home');
Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index'])->name('genres.index');
Route::get('/games/{id}', [App\Http\Controllers\GameController::class, 'show'])->name('games.show');
