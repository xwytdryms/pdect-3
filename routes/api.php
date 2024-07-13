<?php
use App\Http\Controllers\UplinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// uplink chirpstack route
Route::post('uplink/chirpstack', [UplinkController::class, 'chirpstack'])->name('uplink.chirpstack');

// uplink getData for tekegram bot
Route::get('uplink/getData',[UplinkController::class, 'getData'])->name('uplink.getdata');