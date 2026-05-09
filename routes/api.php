<?php

use App\Http\Controllers\Api\SoftwareController;
use App\Models\Genre;
use Illuminate\Support\Facades\Route;

Route::apiResources ([
    'software'=> SoftwareController::class
    ]);
Route::get('/genres', function () {
    return response()->json([
        'data' => Genre::all()
    ]);
});