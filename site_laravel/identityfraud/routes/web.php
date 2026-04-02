<?php

// use App\Http\Controllers\AuthController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvictionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdminPlayerController;

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

    Route::get('/eviction', [EvictionController::class, 'index'])->name('eviction.index');
    Route::post('/eviction/{player}/vote', [EvictionController::class, 'vote'])->name('eviction.vote');

    Route::resource('feed', FeedController::class)
        ->only(['index', 'store', 'show']);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('admin', AdministradorController::class)
        ->only(['index']);

    Route::get('/admin/players',          [AdminPlayerController::class, 'manage'])->name('admin.players.manage');
    Route::get('/admin/players/remover',  [AdminPlayerController::class, 'remove'])->name('admin.players.remove');
    Route::get('/admin/players/consulta', [AdminPlayerController::class, 'consulta'])->name('admin.players.consulta');

    Route::get('/admin/eviction', [EvictionController::class, 'adminIndex'])->name('admin.eviction.index');
    Route::post('/admin/eviction', [EvictionController::class, 'store'])->name('admin.eviction.store');
    Route::delete('/admin/eviction/{player}', [EvictionController::class, 'removePlayer'])->name('admin.eviction.remove');
    Route::delete('/admin/eviction', [EvictionController::class, 'reset'])->name('admin.eviction.reset');
});

Route::resource('players', PlayerController::class)
    ->only(['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']);

Route::resource('news', NewsController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::post('/feed/{post}/comments', [CommentController::class, 'store'])
    ->name('comments.store');

Route::post('/posts/{post}/like', [FeedController::class, 'like'])
    ->name('posts.like');

require __DIR__.'/settings.php';
