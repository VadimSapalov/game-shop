<?php

use App\Http\Controllers\Admin\SoftwareController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Models\Software;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'softwares' => Software::all(),
        'auth' => ['user' => auth()->user(),],
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/library', [MainController::class, 'library'])->name('library');
    Route::post('/software/purchase/{id}', [SoftwareController::class, 'purchase'])->name('purchase');
});

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/admin/index', [SoftwareController::class, 'index'])->name('index');
    Route::get('/admin/software/edit/{id}', [SoftwareController::class, 'edit'])->name('edit');
    Route::put('/admin/software/update/{id}', [SoftwareController::class, 'update'])->name('update');
    Route::get('/admin/create', [SoftwareController::class, 'create'])->name('create');
    Route::post('/admin/software/store', [SoftwareController::class, 'store'])->name('store');
    Route::delete('/software/{software}', [SoftwareController::class, 'destroy'])->name('destroy');
});

Route::get('/software/{software}', [MainController::class, 'show'])->name('show');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
