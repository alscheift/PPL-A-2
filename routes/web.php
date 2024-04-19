<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PotholesController;

Route::get('/laravel_version', function () {
    return view('welcome');
});

Route::get('/laravel_version', function () {
    return view('welcome');
});

// Auth Route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');;

    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');

    Route::get('/default_dashboard', function () {
        return view('dashboard');
    });

    Route::get('/potholes', [PotholesController::class, 'index'])->name('potholes.index');

    //Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

});

Route::get('/new-signin', function () {
    return view('new-signin');
});

Route::get('/new-signup', function () {
    return view('new-signup');
});