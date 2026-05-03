<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AidRequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
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

   Route::resource('aid_requests', AidRequestController::class);
   Route::delete('aid_requests/{id}', [AidRequestController::class,'destroy']);

    Route::get('aid_requests-trashed',
        [AidRequestController::class,'trashed']
    )->name('aid_requests.trashed');

    Route::get('aid_requests-restore/{id}',
        [AidRequestController::class,'restore']
    )->name('aid_requests.restore');

    Route::delete('aid_requests/force-delete/{id}',
        [AidRequestController::class,'forceDelete']
    )->name('aid_requests.forceDelete');
    Route::resource('categories', CategoryController::class);

Route::get('categories/trashed',[CategoryController::class,'trashed'])
->name('categories.trashed');

Route::post('categories/restore/{id}',
[CategoryController::class,'restore']);

Route::resource('categories', CategoryController::class);
Route::get('categories/trashed', [CategoryController::class,'trashed'])->name('categories.trashed');

Route::resource('contacts', ContactController::class);

Route::get('contacts/trashed',[ContactController::class,'trashed'])->name('contacts.trashed');

Route::put('contacts/{id}/restore',[ContactController::class,'restore']);
});
