<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\UplinkController;
use App\Http\Controllers\ProfileController;
use App\Models\Device;
use App\Models\Uplink;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/monitoringpd/{id}', [MonitoringController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard.show'); // Define the monitoringpd route


Route::controller(DeviceController::class)->group(function () {
    Route::get('/devicemanager', 'index')->middleware(['auth', 'verified'])->name('devicemanager');
    Route::post('/devicemanager', 'store')->middleware(['auth', 'verified'])->name('devicemanager.store');
    Route::put('/devicemanager/{device}', 'update')->middleware(['auth', 'verified'])->name('devicemanager.update');
    Route::delete('/devicemanager/{device}', 'destroy')->middleware(['auth', 'verified'])->name('devicemanager.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
