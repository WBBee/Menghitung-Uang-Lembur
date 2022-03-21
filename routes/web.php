<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EndPointEmployeController;
use App\Http\Controllers\EndPointOvertimeController;
use App\Http\Controllers\EndPointSettingController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    /** End - Point */
    Route::get('/end-point/setting', [Controller::class, "endPointSetting"])->name('endpoint.settings');
    Route::patch('/end-point/setting/update', [EndPointSettingController::class, "Update"])->name('endpoint.settings.update');

    Route::get('/end-point/employees', [Controller::class, "endPointEmploye"])->name('endpoint.employees');
    Route::post('/end-point/employees/create', [EndPointEmployeController::class, "create"])->name('endpoint.employees.create');
    Route::patch('/end-point/employees/update/', [EndPointEmployeController::class, "update"])->name('endpoint.employees.update');

    Route::get('/end-point/overtimes/{id}/preview', [Controller::class, "endPointOvertimeUser"])->name('endpoint.overtimes.user');
    // Route::get('/end-point/overtimes', [EndPointOvertimeController::class, "createOrUpdate"])->name('endpoint.overtimes');
});

