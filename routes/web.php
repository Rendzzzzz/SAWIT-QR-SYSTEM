<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverAuthController;

Route::get('/', function () {
    return redirect()->route('driver.login');
});

// Driver Login
Route::get('/driver/login', [DriverAuthController::class, 'showLogin'])->name('driver.login');
Route::post('/driver/login', [DriverAuthController::class, 'login'])->name('driver.login.post');

// Driver Dashboard (Harus login)
Route::middleware('web')->group(function () {
    Route::get('/driver/dashboard', [DriverAuthController::class, 'dashboard'])->name('driver.dashboard');
    Route::get('/driver/input', [DriverAuthController::class, 'showInputForm'])->name('driver.input.muatan');
    Route::post('/driver/update', [DriverAuthController::class, 'storeMuatan'])->name('driver.update.muatan');
    Route::get('/driver/logout', [DriverAuthController::class, 'logout'])->name('driver.logout');
});
