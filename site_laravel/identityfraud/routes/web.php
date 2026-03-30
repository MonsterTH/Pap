<?php

// use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvictionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Register;

Route::view('/', 'index')
    ->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});

Route::resource('players', PlayerController::class)
    ->only(['index']);

Route::resource('news', NewsController::class)
    ->only(['index']);

Route::resource('eviction', EvictionController::class)
    ->only(['index']);

require __DIR__.'/settings.php';
