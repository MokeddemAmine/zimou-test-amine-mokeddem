<?php

use App\Http\Controllers\PackagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PackagesController::class)->group(function(){
    Route::get('/packages','index')->name('packages.index');
});
