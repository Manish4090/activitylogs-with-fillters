<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;


Route::get('/', function () {
	
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/getactivitylogs', [App\Http\Controllers\HomeController::class, 'getactivitylogs'])->name('getactivitylogs');
