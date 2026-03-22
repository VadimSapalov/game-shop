<?php

use App\Http\Controllers\Api\SoftwareController;
use Illuminate\Support\Facades\Route;

Route::apiResources ([
    'software'=> SoftwareController::class
    ]);
