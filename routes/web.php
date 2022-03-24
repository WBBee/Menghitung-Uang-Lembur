<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\AccessController;
use App\Http\Controllers\Management\UsersController;
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

    /** User - Management */
    Route::get('/users', [UsersController::class, "index"])->name('users');
    Route::get('/users/{id}/edit', [UsersController::class, "show"])->name('users.edit');


    /** Access - Management */
    Route::get('/access', [Controller::class, "Access"])->name('access');
        /** Access - Management Role */
    // Route::get('/access/role/{id}/show', [AccessController::class, "show"])->name('access.role.show');
    Route::get('/access/role/{id}/edit', [AccessController::class, "showRole"])->name('access.role.edit');


    Route::get('/access/permission/{id}/edit', [AccessController::class, "showPermission"])->name('access.permission.edit');
    // Route::get('/permission/{id}/edit', [PermissionsController::class, "show"])->name('permission.edit');

});
