<?php

use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\APIs\CategoryController;
use App\Http\Controllers\APIs\CityController;
use App\Http\Controllers\APIs\CourseController;
use App\Http\Controllers\APIs\TimingController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    // Auth routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);

    // Route::middleware('admin')->group(function () {
        // Categories routes
        Route::prefix('categories')->group(function () {
            Route::post('/toggle-hide', [CategoryController::class, 'bulkHide']);
            Route::get('/', [CategoryController::class, 'index']);
            Route::post('/', [CategoryController::class, 'store']);
            Route::get('{slug}', [CategoryController::class, 'show']);
            Route::put('{slug}', [CategoryController::class, 'update']);
            Route::put('{slug}/seo', [CategoryController::class, 'updateSEO']);
            Route::get('{slug}/multi-images', [CategoryController::class, 'getMultiImages']);
            Route::delete('{slug}/multi-images/{mediaId}', [CategoryController::class, 'deleteMultiImage']);
        });

        // Courses routes
        Route::prefix('courses')->group(function () {
            Route::post('/toggle-hide', [CourseController::class, 'bulkHide']);
            Route::get('/', [CourseController::class, 'index']);
            Route::post('/', [CourseController::class, 'store']);
            Route::get('{slug}', [CourseController::class, 'show']);
            Route::put('{slug}', [CourseController::class, 'update']);
            Route::put('{slug}/seo', [CourseController::class, 'updateSEO']);

            // Timings for one course
            Route::get('{slug}/timings', [TimingController::class, 'indexCourseTimings']);
            Route::post('{slug}/timings', [TimingController::class, 'store']);
        });

        // Timings routes
        Route::patch('timings/{id}/toggle-banner', [TimingController::class, 'toggleBanner']);
        Route::patch('timings/{id}/toggle-upcoming', [TimingController::class, 'toggleUpcoming']);
        Route::post('timings/toggle-hide', [TimingController::class, 'bulkHide']);
        Route::put('timings/batch-update', [TimingController::class, 'timingBatchUpdate']);
        Route::get('timings/search', [TimingController::class, 'index']);

        // Venus routes
        Route::prefix('venus')->group(function () {
            Route::post('/toggle-hide', [CityController::class, 'bulkHide']);
            Route::get('/', [CityController::class, 'index']);
            Route::post('/', [CityController::class, 'store']);
            Route::get('{slug}', [CityController::class, 'show']);
            Route::put('{slug}', [CityController::class, 'update']);
            Route::put('{slug}/seo', [CityController::class, 'updateSEO']);
        });
    // });
});
