<?php

use App\Http\Controllers\MeasurementController;
use App\Livewire\Pages\Dashboard\Dashboard;
use App\Livewire\Pages\Graphic\Graphic;
use App\Livewire\Pages\Logger\EventLogger;
use App\Livewire\Pages\Report\ReportPage;
use App\Livewire\Pages\Table\Table;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use App\Livewire\Pages\Table\TableDetail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => ['role:super_admin|Admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/table', Table::class)->name('table');
    Route::get('/table/detail/{id}', TableDetail::class)->name('table.detail');
    Route::get('health', HealthCheckResultsController::class);
    Route::get('/report',ReportPage::class)->name('report');
    Route::get('/event-logger',EventLogger::class)->name('event-logger');
});

Route::group(['middleware' => ['role:super_admin|Admin|Teknisi']], function () {
    Route::get('/graphic', Graphic::class)->name('graphic');
    Route::get('/get-detail-measurement/{device_id}', [MeasurementController::class, 'getDetailMeasurement']);
    Route::get('/get-last-thirty-minutes/{device_id}', [MeasurementController::class, 'getLastThirtyMinutesData']);
});

require __DIR__ . '/auth.php';
