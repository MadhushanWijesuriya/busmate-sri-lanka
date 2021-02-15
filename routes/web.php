<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard1',[DriverDashBoardController::class, 'index'])->name('dashboard');
Route::get('/dashboard1/route-direction',[DriverDashBoardController::class, 'getRouteDirection'])->name('route.direction');
Route::get('/map',[GoogleMapController::class, 'index'])->name('map');

