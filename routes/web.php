<?php

use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('locations', LocationController::class)
    ->missing(function (Request $request) {
        return redirect()->route('home');
    });
