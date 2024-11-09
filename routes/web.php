<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CityListController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryListController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StateListController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


Route::redirect('/','login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('countries',CountryController::class)->except(['create','show','edit']);
    Route::resource('cities',CityController::class)->except(['create','show','edit']);
    Route::resource('states',StateController::class)->except(['create','show','edit']);

    Route::get('country/list',CountryListController::class)->name('country.list');
    Route::get('city/list',CityListController::class)->name('city.list');
    Route::get('state/list',StateListController::class)->name('state.list');
});

require __DIR__.'/auth.php';

Route::fallback(function () {
    abort(404);
});
