<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\StationController;

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

// Route::prefix('authentication')->group(function () {
//     Route::post('/login', [AuthenticationController::class, 'loginn']);
// });

Route::prefix('device')->group(function () {
    Route::post('/', [DeviceController::class, 'createDevice']);
});

Route::prefix('station')->group(function () {
    Route::post('/', [StationController::class, 'createStation']);
});
