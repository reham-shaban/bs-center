<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [CourseController::class, 'index'])->name('home.index');
