<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show_main_page() {
        return ('Main page');
    }

    public function show_about_page() {
        return ('<h1>About</h1>');
    }
}
