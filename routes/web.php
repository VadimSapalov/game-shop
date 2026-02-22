<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'show_main_page']);

Route::get('/games', [GamesController::class, 'show_all_games']);
