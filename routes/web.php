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
use App\Http\Controllers\videoController;
use App\Http\Controllers\messageController;

use App\Http\Controllers\regular\pagesController;

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

// admin panel
Route::group(['middleware' => 'auth'],function(){
    Route::view('/admin','layouts.app');
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
        Route::get('/createitem/{category_id?}',$address.'@create')
        ->whereNumber('category_id')
        ->name('items.create');


        Route::resource('itemimages',itemImageController::class)->only([
            'show','store','destroy'
        ]);
        $address = 'App\Http\Controllers\itemImageController';
        Route::get('/createitemimages/{item_id}',$address.'@create')
        ->whereNumber('item_id')
        ->name('itemimages.create');


        Route::resource('categories',categoryController::class)->except(['create']);
        $address = 'App\Http\Controllers\categoryController';
        Route::get('categories/{parent_id}/create',$address.'@create')
        ->whereAlphaNumeric('parent_id')
        ->name('categories.create');

        Route::resource('packages',packageController::class)->except(['show']);

        Route::resource('galleries',galleryController::class)->only('index','store','destroy');

        Route::resource('callinfo',callInfoController::class)->except(['show']);

        Route::resource('videos',videoController::class)->only(['store','destroy']);

        Route::get('/dashboard',[messageController::class, 'newMessages'])->name('admin');
        Route::get('/messages',[messageController::class, 'allMessages'])->name('messages.all');
        Route::get('/messages/{id}',[messageController::class, 'show'])->whereNumber('id')->name('message.show');
        Route::Delete('/messages/{id}',[messageController::class,'deleteMessage'])->whereNumber('id')->name('message.delete');

    });
});

// guest pages
Route::get('/',[pagesController::class,'index'])->name('index');
    // contact us
Route::post('/contactus',[pagesController::class,'newMsg'])->name('contactus');

// aboutus
Route::get('/about-us/{lang?}',[pagesController::class,'showAboutus'])->name('showAboutus');

// managers
Route::get('/managers/{lang?}',[pagesController::class,'showManagers'])->name('showManagers');
Route::get('/managers/{id}/{lang?}',[pagesController::class,'showAManager'])->whereNumber('id')->name('showAmanager');

// blogs
Route::get('/latest-blogs/{lang?}',[pagesController::class,'latestBlogs'])->name('latestBlogs');
    // show 5 new
Route::get('/all-blogs/{lang?}',[pagesController::class,'allBlogs'])->name('allBlogs');
    // show all
Route::get('/showblog/{id}',[pagesController::class,'showblog'])->whereNumber('id')->name('showblog');
    // show one

// gallery
Route::get('/gallery',[pagesController::class,'gallery'])->name('gallery');
// items
    // latest
Route::get('/latest-items/{lang?}',[pagesController::class,'latestItems'])->name('latestItems');
    // all
Route::get('/all-items/{lang?}',[pagesController::class,'allItems'])->name('allItems');
    // one
Route::get('/one-item/{lang?}/{item}',[pagesController::class,'oneItem'])->whereNumber('item')->name('oneItem');