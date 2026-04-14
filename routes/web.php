<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [GameController::class, 'index']);
