
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AidRequestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect('/cms/admin');
});

Route::prefix('cms/admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admins.index');
    })->name('cms.home');
   Route::get('admins/trashed', [AdminController::class, 'trashed'])
        ->name('admins.trashed');

    Route::post('admins/restore/{id}', [AdminController::class, 'restore'])
        ->name('admins.restore');

    Route::delete('admins/force-delete/{id}', [AdminController::class, 'forceDelete'])
        ->name('admins.forceDelete');


    Route::resource('admins', AdminController::class);

    Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');

    Route::post('visitors_update/{id}', [VisitorController::class, 'update'])
    ->name('visitors_update');
     Route::get('visitors/trashed', [VisitorController::class, 'trashed'])
        ->name('visitors.trashed');

    Route::post('visitors/restore/{id}', [VisitorController::class, 'restore'])
        ->name('visitors.restore');

    Route::delete('visitors/force-delete/{id}', [VisitorController::class, 'forceDelete'])
        ->name('visitors.forceDelete');

    Route::resource('visitors', VisitorController::class);


    Route::post('governorates_update/{id}', [GovernorateController::class, 'update'])->name('governorates_update');
Route::get('governorates/trashed', [GovernorateController::class, 'trashed'])
    ->name('governorates.trashed');

Route::put('governorates/{id}/restore', [GovernorateController::class, 'restore'])
    ->name('governorates.restore');

Route::delete('governorates/force-delete/{id}', [GovernorateController::class, 'forceDelete'])
    ->name('governorates.forceDelete');

Route::resource('governorates', GovernorateController::class);

    Route::post('locations_update/{id}', [LocationController::class, 'update'])->name('locations_update');
  // trashed locations
Route::get('locations/trashed', [LocationController::class, 'trashed'])
    ->name('locations.trashed');

// restore
Route::put('locations/{id}/restore', [LocationController::class, 'restore'])
    ->name('locations.restore');

// force delete
Route::delete('locations/{id}/force-delete', [LocationController::class, 'forceDelete'])
    ->name('locations.forceDelete');
        Route::resource('locations', LocationController::class);
    Route::get('categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::post('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/force-delete/{id}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
    Route::resource('categories', CategoryController::class);

    Route::get('aid_requests/trashed', [AidRequestController::class, 'trashed'])->name('aid_requests.trashed');
    Route::get('aid_requests-trashed', [AidRequestController::class, 'trashed'])->name('aid_requests.trashed.old');
    Route::get('aid_requests-restore/{id}', [AidRequestController::class, 'restore'])->name('aid_requests.restore.old');
    Route::post('aid_requests/restore/{id}', [AidRequestController::class, 'restore'])->name('aid_requests.restore');
    Route::delete('aid_requests/force-delete/{id}', [AidRequestController::class, 'forceDelete'])->name('aid_requests.forceDelete');
    Route::resource('aid_requests', AidRequestController::class);


Route::get('comments/trashed', [CommentController::class, 'trashed'])
    ->name('comments.trashed');

Route::put('comments/{id}/restore', [CommentController::class, 'restore'])
    ->name('comments.restore');

Route::delete('comments/{id}/force-delete', [CommentController::class, 'forceDelete'])
    ->name('comments.forceDelete');

// update custom
Route::post('comments_update/{id}', [CommentController::class, 'update'])
    ->name('comments_update');


Route::resource('comments', CommentController::class);
    Route::get('contacts/trashed', [ContactController::class, 'trashed'])->name('contacts.trashed');
    Route::post('contacts/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::put('contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore.put');
    Route::delete('contacts/force-delete/{id}', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
    Route::resource('contacts', ContactController::class);
});
