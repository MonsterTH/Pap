<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvictionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('login', fn() => to_route('auth.create'))
    ->name('login');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::resource('players', PlayerController::class)
    ->only(['index']);

Route::resource('news', NewsController::class)
    ->only(['index']);

Route::resource('eviction', EvictionController::class)
    ->only(['index']);

require __DIR__.'/settings.php';
