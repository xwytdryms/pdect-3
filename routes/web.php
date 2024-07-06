<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UplinkController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/monitoringpd', [UplinkController::class, 'index'])
->middleware(['auth', 'verified'])->name('monitoringpd'); // Define the monitoringpd route

Route::controller(DeviceController::class)->group(function () {
    Route::get('/devicemanager', 'index')->middleware(['auth', 'verified'])->name('devicemanager');
    Route::post('/devicemanager', 'store')->middleware(['auth', 'verified'])->name('devicemanager.create');
    Route::patch('/devicemanager', 'update')->middleware(['auth', 'verified'])->name('devicemanager.update');
    Route::delete('/devicemanager', 'destroy')->middleware(['auth', 'verified'])->name('devicemanager.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
