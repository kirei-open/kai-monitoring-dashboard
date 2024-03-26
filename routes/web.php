<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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

require __DIR__.'/auth.php';
