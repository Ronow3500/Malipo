<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AirtimeController;
use Admin\UserController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MtechController;
use App\Http\Controllers\ProjectController;

//use UserGuideController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('/');

/**
 * UserGuide Routes
 */
Route::middleware(['auth'])->resource('guide', UserGuideController::class);

/**
 * Admin routes 
 */
Route::prefix('admin')->middleware(['auth','role'])->name('admin.')->group(function ()
{
    Route::resource('/user', UserController::class);
});

/**
 * Finance Routes
 */
Route::get('finance/index', [FinanceController::class, 'index'])->middleware(['auth','role'])->name('finance.index');

/**
 * Incentives Routes 
 */

Route::middleware(['auth'])->group(function ()
{
    Route::post('dashboard', [AirtimeController::class, 'index']);
    Route::get('dashboard', [AirtimeController::class, 'index'])->name('dashboard');
    Route::get('create_project', [ProjectController::class, 'create'])->name('create_project');
    Route::get('airtime', [AirtimeController::class, 'upload_csv'])->name('airtime');
    Route::post('import_csv', [AirtimeController::class, 'import_csv'])->name('import_csv');
    Route::resource('project', ProjectController::class);
    // MTECH SMS Routes
    Route::get('sms', [MtechController::class, 'sms'])->name('sms');
    Route::post('import_recepients', [MtechController::class, 'import_recepients'])->name('import_recepients');

    Route::get('success', function () {
    return view('home.success');
})->name('success');

    Route::get('error', function () {
    return view('home.error');
})->name('error');

});

/**
 * System Logs
 */

Route::middleware(['auth'])->get('system_logs', [LogController::class, 'index'])->name('system_logs');



