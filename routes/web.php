<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PotholesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/laravel_version', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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