<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\DriverDashBoardController;
use App\Http\Controllers\GoogleMapController;
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
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/',[DriverDashBoardController::class, 'index'])->name('dashboard');
        Route::get('/route-direction',[DriverDashBoardController::class, 'getRouteDirection'])->name('dashboard.bus-routes');

    });
    Route::prefix('bus')->group(function () {

        Route::get('/',[BusController::class, 'index'])->name('bus');
        Route::get('/get-datatable',[BusController::class, 'getBusData'])->name('bus.datatable');
        Route::get('/create',[BusController::class, 'create'])->name('bus.create');
        Route::post('/store',[BusController::class, 'store'])->name('bus.store');
        Route::get('/edit/{id}',[BusController::class, 'edit'])->name('bus.edit');
        Route::put('/update/{id}',[BusController::class, 'update'])->name('bus.update');



    });
});

