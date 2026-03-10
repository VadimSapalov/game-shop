<?php

use App\Http\Controllers\Admin\SoftwareController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SoftwareController::class, 'index'])->name('admin.software.index');

//Створення посилань на сторінки методів в Software контролері
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('software', SoftwareController::class);
});

Route::get('/about', [MainController::class, 'about']);