<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\UplinkController;
use App\Http\Controllers\ProfileController;
use App\Models\Device;
use App\Models\Uplink;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route with sortable table
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Monitoring route (unchanged)
Route::get('/monitoringpd/{id}', [MonitoringController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.show');
Route::post('/monitoringpd', [MonitoringController::class, 'resetArcCounter'])
    ->middleware(['auth', 'verified'])
    ->name('reset.arccounter');



// Device manager routes
Route::controller(DeviceController::class)->group(function () {
    Route::get('/devicemanager', 'index')->middleware(['auth', 'verified'])->name('devicemanager');
    Route::post('/devicemanager', 'store')->middleware(['auth', 'verified'])->name('devicemanager.store');
    Route::put('/devicemanager/{device}', 'update')->middleware(['auth', 'verified'])->name('devicemanager.update');
    Route::delete('/devicemanager/{device}', 'destroy')->middleware(['auth', 'verified'])->name('devicemanager.delete');
});

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
