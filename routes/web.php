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


#### Relation ######

Route::get('one-to-one',[Relations::class,'oneToOne'] );
Route::get('inverse-one-to-one',[Relations::class,'inverseOneToOne'] );


Route::get('one-to-many',[Relations::class,'oneToMany'] );

Route::get('many-to-many-blog',[Relations::class,'manyToManyBlog'] );

Route::get('many-to-many-tag',[Relations::class,'manyToManyTag'] );

Route::get('one-to-many-through',[Relations::class,'oneToManyThrough'] );

Route::get('many-to-many-through',[Relations::class,'manyToManyThrough'] );


Route::get('one-to-one-ploy-blog',[Relations::class,'oneToOnePloyBlog'] );

Route::get('one-to-one-ploy-client',[Relations::class,'oneToOnePloyClient'] );

Route::get('one-to-one-ploy-image',[Relations::class,'oneToOnePloyImage'] );

Route::get('one-to-one-ploy-blogs',[Relations::class,'oneToOnePloyBlogs'] );

Route::get('one-to-one-ploy-clients',[Relations::class,'oneToOnePloyClients'] );


Route::get('many-to-many-ploy-blog',[Relations::class,'manyToManyPloyBlog'] ); 
Route::get('many-to-many-ploy-video',[Relations::class,'manyToManyPloyVideo'] );
Route::get('many-to-many-ploy-tag',[Relations::class,'manyToManyPloyTag'] );
