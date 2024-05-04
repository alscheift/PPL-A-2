<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PotholesController;
use App\Http\Controllers\DashboardController;


// Admin
use App\Http\Controllers\admin\PotholesController as AdminPotholesController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\UsersController as AdminUsersController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route Guest

Route::get('/', [GuestsController::class, 'index'])->name('home'); // Landing Page

Route::get('/laravel_welcome', function () {
    return view('laravel.welcome');
});




// Auth Route
Route::group([
    'middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ],
    'prefix' => 'dashboard'
], function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/jetstream', function () {
        return view('dashboard');
    });

    // Potholes
    Route::get('/potholes', [PotholesController::class, 'index'])->name('potholes.index');
    Route::get('/potholes/create', [PotholesController::class, 'create'])->name('potholes.create');
    Route::post('/potholes', [PotholesController::class, 'store'])->name('potholes.store');
    Route::delete('potholes/{id}', [PotholesController::class, 'destroy'])->name('potholes.destroy');


    //Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    // == Admin Route ==
    Route::group([
        'middleware' => [
            'admin'
        ],
        'as' => 'admin.'
    ], function () {
        // Potholes Admin (Approval)
        Route::resource('admin-potholes', AdminPotholesController::class);
        
        // Users
        Route::get('/users', [AdminUsersController::class, 'index'])->name('users.index');
        Route::post('/user/{id}/verify', [AdminUsersController::class, 'verifyUser'])->name('users.verify');

        // Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    });
});

