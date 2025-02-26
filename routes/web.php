<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/', [CountryController::class, 'index'])->name('home');
Route::get('/about', [CountryController::class, 'about'])->name('about');
Route::get('/explore', [CountryController::class, 'explore'])->name('explore');
Route::get('/search', [CountryController::class, 'search'])->name('search');
Route::get('/country/{code}', [CountryController::class, 'show'])->name('country.show');