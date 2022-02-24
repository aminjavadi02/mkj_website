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
use App\Http\Controllers\callInfoController;

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

// random comment
Route::get('/app', function () {
    return view('layouts.app');
})->name('app');

// admin pannel
// add prefix: admin

Route::prefix('admin')->group(function(){

    Route::resource('blogs',blogController::class);

    Route::resource('aboutus',aboutusController::class)->only([
        'update','show','edit'
    ]);

    Route::resource('managers',managerController::class)->except(['show']);


    Route::resource('items',itemController::class)->except([
        'create',
    ]);
    $address = 'App\Http\Controllers\itemController';
    Route::get('/createitem/{category_id?}',$address.'@create')->name('items.create');


    Route::resource('itemimages',itemImageController::class)->only([
        'show','store','destroy'
    ]);
    $address = 'App\Http\Controllers\itemImageController';
    Route::get('/createitemimages/{item_id}',$address.'@create')->name('itemimages.create');


    Route::resource('categories',categoryController::class)->except(['create']);
    $address = 'App\Http\Controllers\categoryController';
    Route::get('categories/{parent_id}/create',$address.'@create')->name('categories.create');

    Route::resource('packages',packageController::class)->except(['show']);

    Route::resource('galleries',galleryController::class)->only('index','store','destroy');

    Route::resource('callinfo',callInfoController::class)->except(['show']);

});