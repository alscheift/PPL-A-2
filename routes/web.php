<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;


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
});

//Settings
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
