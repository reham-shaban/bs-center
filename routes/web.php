<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\CityController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\CourseController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    // Navigation bar Screens
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/venus', [CityController::class, 'index'])->name('cities.index');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/about', function () {return view('screen.about');})->name('about');
    Route::get('/contact', [ContactUsController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

    // Other Screens
    Route::get('/blog', function () {return view('screen.blog');})->name('blog.show');
    Route::get('/city', function () {return view('screen.city');})->name('city.show');
    Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.show');
    Route::get('/courses', function () {return view('screen.courses');})->name('courses.index');
    Route::get('/privacy-policy', function () {return view('screen.privacyPolicy');})->name('privacy-policy');
    Route::get('/sitemap', function () {return view('screen.sitemap');})->name('sitemap');
    Route::get('/terms', function () {return view('screen.terms');})->name('terms');

    // Forms Screens
    Route::get('/register', function () {return view('screen.registration');})->name('register.index');
    Route::get('/enquire', function () {return view('screen.enquireNow');})->name('enquire.index');
    Route::get('/join-team', function () {return view('screen.joinOurTeam');})->name('join-team.index');
    Route::get('/request-in-house', function () {return view('screen.requestInHouse');})->name('request-in-house.index');
    Route::get('/request-online', function () {return view('screen.requestOnline');})->name('request-online.index');

    // helper apis for getting data
    Route::get('{slug}/all-timings', [CourseController::class, 'getAllCourseTimings'])->name('course.timings');
    Route::get('/api/upcoming-courses', [HomeController::class, 'getUpcomingCourses']);
    Route::get('/api/search-courses', [HomeController::class, 'searchCourses']);

});
