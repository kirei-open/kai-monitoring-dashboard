<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Livewire\TableDetailComponent;
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

Route::group(['middleware' => ['guest']],function(){
    Volt::route('/','pages.auth.login')->name('login');
});


Route::group(['middleware' => ['role:super_admin|Admin']], function () {
    Route::view('/landing', 'landing'); 
    Route::view('/table','table');
    Route::get('/table/detail/{id}',TableDetailComponent::class)->name('table.detail');
    Route::view('/logger','event-logger');
    Route::view('/report','report');
    Route::view('/audit','audit');
    Route::view('/graphic','graphic-monitoring');
    Route::get('/get-detail-measurement/{device_id}', [MeasurementController::class, 'getDetailMeasurement']);
});

Route::group(['middleware' => ['role:super_admin|Admin|Teknisi']],function(){
    Route::view('/graphic','graphic-monitoring');
    Route::get('/get-detail-measurement/{device_id}', [MeasurementController::class, 'getDetailMeasurement']);
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
