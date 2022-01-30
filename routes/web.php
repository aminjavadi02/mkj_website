<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\aboutusController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\packageController;
use App\Http\Controllers\itemImageController;
use App\Http\Controllers\galleryController;

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

// admin pannel
// add prefix: admin


Route::resource('blogs',blogController::class);
Route::resource('aboutus',aboutusController::class)->only([
    'update','edit','show'
]);
Route::resource('managers',managerController::class);
Route::resource('items',itemController::class);
Route::resource('itemImages',itemImageController::class)->only([
    'create','store','destroy'
]);
Route::resource('categories',categoryController::class);

// $address = "App\Http\Controllers\categoryController";






Route::resource('packages',packageController::class);
Route::resource('galleries',galleryController::class)->except([
    'update','edit'
]);


// ->except(['destroy'])
// ->only(['update'])