<?php

use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\APIs\CategoryController;
use App\Http\Controllers\APIs\CourseController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    // Auth routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        // Categories routes
        Route::prefix('categories')->group(function () {
            Route::post('/hide', [CategoryController::class, 'bulkHide']);
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('{slug}', [CategoryController::class, 'show'])->name('categories.show');
            Route::put('{slug}', [CategoryController::class, 'update'])->name('categories.update');
            Route::post('{id}/unhide', [CategoryController::class, 'unhide'])->name('categories.unhide');
            Route::put('{slug}/seo', [CategoryController::class, 'updateSEO'])->name('categories.updateSEO');
            Route::get('{slug}/multi-images', [CategoryController::class, 'getMultiImages'])->name('categories.getMultiImages');
            Route::delete('{slug}/multi-images/{mediaId}', [CategoryController::class, 'deleteMultiImage'])->name('categories.deleteMultiImage');
        });

        // Courses routes
        Route::prefix('courses')->group(function () {
            Route::post('/hide', [CourseController::class, 'bulkHide']);
            Route::get('/', [CourseController::class, 'index']);
            Route::post('/', [CourseController::class, 'store']);
            Route::get('{slug}', [CourseController::class, 'show']);
            Route::put('{slug}', [CourseController::class, 'update']);
            Route::post('{id}/unhide', [CourseController::class, 'unhide']);
            Route::put('{slug}/seo', [CourseController::class, 'updateSEO']);
        });

        // Timings routes
        Route::get('course/{slug}/timings', [CourseController::class, 'indexCourseTimings']);
    });
});
