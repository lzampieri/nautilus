<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CataloguesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Main
Route::get('/', [HomeController::class, 'home'])->name('home');

// Auth
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('callback', [AuthController::class, 'callback'])->name('auth.callback');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Users management
Route::prefix('user')->group(function () {
    Route::get('register', [UserController::class, 'register'])->name('user.register');
    Route::post('register', [UserController::class, 'register_post']);
});

// Map
Route::get('/map', [HomeController::class, 'map'])->name('map');

Route::post('/catalogue_create', [CataloguesController::class, 'new_post'])->name('catalogue.create');