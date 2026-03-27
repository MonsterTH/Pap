<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('login', fn() => to_route('auth.create'))->name('login');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

require __DIR__.'/settings.php';
