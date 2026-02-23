<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function show_all_games() {
        return view('games_list');
    }

    public function show_chosen_game($game_id) {
        return view('game_by_id', ['id' => $game_id]);
    }
}

