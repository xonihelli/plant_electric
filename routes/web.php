<?php

use App\Http\Controllers\Charges\ChargeDerivateController;
use App\Http\Controllers\Charges\ChargeSubDerivateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Room\ElectricChargeController;
use App\Http\Controllers\Room\RoomController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('rooms')->name('rooms.')->group(function () {
        Route::resource('room', RoomController::class);
        Route::resource('electric-charge', ElectricChargeController::class);
    });

    Route::prefix('charge')->name('charge.')->group(function () {
        Route::resource('directive', ChargeDerivateController::class);
        Route::resource('sub-directive', ChargeSubDerivateController::class);
    });
});

require __DIR__ . '/auth.php';
