<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'show_main_page']);

Route::get('/about', [MainController::class, 'show_about_page']);

Route::get('/games', [GamesController::class, 'show_all_games']);

Route::get('/games/{game_id}', [GamesController::class, 'show_chosen_game']) -> where('game_id', '[0-9]+');
