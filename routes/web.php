<?php

use Livewire\Volt\Volt;
use App\Events\testbroadcast;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MeasurementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Volt::route('/','pages.auth.login')->name('login');

Route::get('/test', function () {
    return view('test');
});

Route::get('/test-broadcast', function () {
    $message = 'HAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHA';
    
    event(new testbroadcast($message));

});

Route::group(['middleware' => ['role:super_admin|Admin']], function () {
    Route::view('/landing', 'landing'); 
    Route::view('/table','table');
    Route::view('/logger','event-logger');
    Route::view('/voice','voice-logger');
    Route::view('/report','report');
    Route::view('/graphic','graphic-monitoring');
    Route::view('/audit','audit');
});

Route::view('/graphic','graphic-monitoring')->middleware('role:Teknisi|Admin|super_admin');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::middleware(['auth'])->prefix('station')->group(function () {
    Route::post('/', [StationController::class], 'createStation');
    Route::get('/', [StationController::class], 'getStation');
    Route::get('/{id}', [StationController::class], 'getDetailStation');
    Route::put('/{id}', [StationController::class], 'updateStation');
    Route::delete('/{id}', [StationController::class], 'deleteStation');
});

Route::middleware(['auth'])->prefix('device')->group(function () {
    Route::post('/', [DeviceController::class], 'createDevice');
    Route::get('/', [DeviceController::class], 'getDevice');
    Route::get('/{serial_number}', [DeviceController::class], 'getDetailDevice');
    Route::put('/{serial_number}', [DeviceController::class], 'updateDevice');
    Route::delete('/{serial_number}', [DeviceController::class], 'deleteDevice');
});

Route::middleware(['auth'])->prefix('location')->group(function () {
    Route::post('/', [LocationController::class], 'createLocation');
    Route::get('/', [LocationController::class], 'getLocation');
    Route::get('/{id}', [LocationController::class], 'getDetailLocation');
    Route::put('/{id}', [LocationController::class], 'updateLocation');
    Route::delete('/{id}', [LocationController::class], 'deleteLocation');
});

Route::middleware(['auth'])->prefix('measurement')->group(function () {
    Route::post('/', [MeasurementController::class], 'createMeasurement');
    Route::get('/', [MeasurementController::class], 'getMeasurement');
    Route::get('/{id}', [MeasurementController::class], 'getDetailMeasurement');
    Route::put('/{id}', [MeasurementController::class], 'updateMeasurement');
    Route::delete('/{id}', [MeasurementController::class], 'deleteMeasurement');
});

require __DIR__.'/auth.php';
