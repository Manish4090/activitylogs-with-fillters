<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\MachanicController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;


Route::get('/', function () {
	
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/getactivitylogs', [App\Http\Controllers\HomeController::class, 'getactivitylogs'])->name('getactivitylogs');

Route::get('/add-machanic', [MachanicController::class, 'add_machanic']);
Route::get('/add-car/{id}', [CarController::class, 'add_car']);
Route::get('/add-owner/{id}', [OwnerController::class, 'add_owner']);
Route::get('/show-owner/{id}', [MachanicController::class, 'show_owner']);
