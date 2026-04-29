<?php

use App\Http\Controllers\Admin\SoftwareController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SoftwareController::class, 'home'])->name('home');
Route::get('/software/{software}', [MainController::class, 'show'])->name('show');
Route::post('/software/{software}/purchase', [SoftwareController::class, 'purchase'])->name('software.purchase');

// Захищені маршрути адміністрування
Route::middleware(['auth', 'verified', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('software', SoftwareController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/library', [MainController::class, 'library'])->name('library');
});

require __DIR__.'/auth.php';
