<?php

// use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvictionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Register;

Route::view('/', 'index')
    ->name('home');

Route::view('about', 'about')
    ->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    })->name('logout');

    Route::resource('profile', ProfileController::class)
        ->only(['index']);

    Route::resource('eviction', EvictionController::class)
        ->only(['index']);

    Route::resource('feed', FeedController::class)
        ->only(['index']);
});

Route::resource('players', PlayerController::class)
    ->only(['index']);

Route::resource('news', NewsController::class)
    ->only(['index']);

Route::middleware('auth')->post('feed', [FeedController::class, 'store'])->name('feed.store');

require __DIR__.'/settings.php';
