<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});
//  Route::view('cms/admin', 'cms.parent');

Route::prefix('cms/admin')->group(function(){
    Route::view('', 'cms.temp');
Route::view('', 'cms.parent');

 Route::resource('governorates', GovernorateController::class);
 Route::post('governorates_update/{id}',[GovernorateController::class,'update'])->name('governorates_update');

 Route::resource('locations', LocationController::class);
 Route::post('locations_update/{id}',[LocationController::class,'update'])->name('locations_update');

 Route::resource('admins', AdminController::class);
 Route::post('admins_update/{id}',[AdminController::class,'update'])->name('admins_update');

 Route::resource('visitors', VisitorController::class);
 Route::post('visitors_update/{id}',[VisitorController::class,'update'])->name('visitors_update');

 Route::resource('comments', CommentController::class);
 Route::post('comments_update/{id}',[CommentController::class,'update'])->name('comments_update');


});
