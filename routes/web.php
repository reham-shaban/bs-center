<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\CityController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\ContactUsController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/venus', [CityController::class, 'index'])->name('cities.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/contact/create', [ContactUsController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');
