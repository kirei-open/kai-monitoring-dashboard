<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MeasurementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('station')->group(function () {
    Route::post('/', [StationController::class, 'createStation']);
    Route::get('/', [StationController::class, 'getStation']);
    Route::get('/{id}', [StationController::class, 'getDetailStation']);
    Route::put('/{id}', [StationController::class, 'updateStation']);
    Route::delete('/{id}', [StationController::class, 'deleteStation']);
});

Route::middleware('auth:sanctum')->prefix('device')->group(function () {
    Route::post('/', [DeviceController::class, 'createDevice']);
    Route::get('/', [DeviceController::class, 'getDevice']);
    Route::get('/{serial_number}', [DeviceController::class, 'getDetailDevice']);
    Route::put('/{serial_number}', [DeviceController::class, 'updateDevice']);
    Route::delete('/{serial_number}', [DeviceController::class, 'deleteDevice']);
});

Route::middleware('auth:sanctum')->prefix('location')->group(function () {
    Route::post('/', [LocationController::class, 'createLocation']);
    Route::get('/', [LocationController::class, 'getLocation']);
    Route::get('/{id}', [LocationController::class, 'getDetailLocation']);
    Route::put('/{id}', [LocationController::class, 'updateLocation']);
    Route::delete('/{id}', [LocationController::class, 'deleteLocation']);
});

Route::middleware('auth:sanctum')->prefix('measurement')->group(function () {
    Route::post('/', [MeasurementController::class, 'createMeasurement']);
    Route::get('/', [MeasurementController::class, 'getMeasurement']);
    Route::get('/{id}', [MeasurementController::class, 'getDetailMeasurement']);
    Route::put('/{id}', [MeasurementController::class, 'updateMeasurement']);
    Route::delete('/{id}', [MeasurementController::class, 'deleteMeasurement']);
});
