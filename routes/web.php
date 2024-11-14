<?php

use App\Http\Controllers\PackagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PackagesController::class)->group(function(){
    Route::get('/packages','index')->name('packages.index');
    Route::get('/create_package','create')->name('packages.create');
    Route::post('/store_package','store')->name('packages.store');
    Route::get('/downloadPackages','export')->name('packages.export');
});
