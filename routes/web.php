<?php

use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PotholesController;


// Admin
use App\Http\Controllers\admin\PotholesController as AdminPotholesController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\UsersController as AdminUsersController;

Route::get('/', function () {
    return view('home');
});
Route::get('/', [PotholesController::class, 'showMap'])->name('home');

Route::get('/laravel_version', function () {
    return view('welcome');
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
    Route::get('/', function () {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard.index');
        }

        return view('user.dashboard.index');
    })->name('dashboard');

    Route::get('/default_dashboard', function () {
        return view('dashboard');
    });

    Route::get('/potholes', [PotholesController::class, 'index'])->name('potholes.index');
    Route::get('/potholes/create', [PotholesController::class, 'create'])->name('potholes.create');
    Route::post('/potholes', [PotholesController::class, 'store'])->name('potholes.store');
    Route::delete('potholes/{id}', [PotholesController::class, 'destroy'])->name('potholes.destroy');
    Route::get('/potholes/create',[PotholesController::class, 'showForm'])->name('potholes.create');


    //Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
});

Route::get('/new-signin', function () {
    return view('new-signin');
});

Route::get('/new-signup', function () {
    return view('new-signup');
});

// Route::get('/home', function () {
//     return view('home');
// });

Route::group([
    'middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'admin'
    ],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::resource('potholes', PotholesController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/user/{id}/verify', [UserController::class, 'verifyUser'])->name('users.verify');
    Route::resource('dashboard', AdminDashboardController::class);
});
