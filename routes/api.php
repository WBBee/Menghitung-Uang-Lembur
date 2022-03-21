<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EndPointEmployeController;
use App\Http\Controllers\EndPointOvertimeController;
use App\Http\Controllers\EndPointSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('end-point/login', [AuthController::class, 'Login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    /** Setting */
    Route::patch('end-point/setting/update', [EndPointSettingController::class, 'update']);

    /** Employe */
    Route::get('end-point/employe/display', [EndPointEmployeController::class, 'index']);
    Route::post('end-point/employe/create', [EndPointEmployeController::class, 'create']);

    /** Overtime */
    Route::post('end-point/overtime/display', [EndPointOvertimeController::class, 'index']);
    Route::post('end-point/overtime/create', [EndPointOvertimeController::class, 'create']);
    Route::post('end-point/overtime/overtimePays', [EndPointOvertimeController::class, 'overtimePays']);
});
