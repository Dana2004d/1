
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

    Route::resource('admins', AdminController::class);
    Route::post('admins_update/{id}', [AdminController::class, 'update'])->name('admins_update');

    Route::resource('visitors', VisitorController::class);
    Route::post('visitors_update/{id}', [VisitorController::class, 'update'])->name('visitors_update');

    Route::resource('governorates', GovernorateController::class);
    Route::post('governorates_update/{id}', [GovernorateController::class, 'update'])->name('governorates_update');

    Route::resource('locations', LocationController::class);
    Route::post('locations_update/{id}', [LocationController::class, 'update'])->name('locations_update');

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

    Route::resource('comments', CommentController::class);
    Route::post('comments_update/{id}', [CommentController::class, 'update'])->name('comments_update');

    Route::get('contacts/trashed', [ContactController::class, 'trashed'])->name('contacts.trashed');
    Route::post('contacts/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::put('contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore.put');
    Route::delete('contacts/force-delete/{id}', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
    Route::resource('contacts', ContactController::class);
});
