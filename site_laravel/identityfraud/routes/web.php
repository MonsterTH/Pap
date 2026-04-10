<?php

// use App\Http\Controllers\AuthController;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvictionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\AdminRegister;
use App\Livewire\Register;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\BountyController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\HomeController;
use App\Livewire\SeasonIndex;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Livewire\TwoFactorVerify;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('about', 'about')
    ->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// Página a dizer "verifica o teu email"
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/2fa', TwoFactorVerify::class)->name('2fa.verify');

// Confirma o link do email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Reenviar email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

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
    Route::get('/admin/register', AdminRegister::class)->name('adminregister');

    Route::resource('news', NewsController::class)
    ->only(['create', 'store']);

    Route::resource('season', SeasonController::class)
        ->only(['create', 'store', 'show']);

    Route::get('/seasons', SeasonIndex::class)->name('seasons.index');

    Route::resource('bounty', BountyController::class)
        ->only(['create', 'store']);

    Route::resource('activity', ActivityController::class)
        ->only(['create', 'store']);

    Route::put('/seasons/{season}/finish', [SeasonController::class, 'finish'])
    ->name('seasons.finish');
});

Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::resource('players', PlayerController::class)
    ->only(['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']);

Route::resource('news', NewsController::class)
    ->only(['index', 'show']);

Route::resource('season', SeasonController::class)
    ->only(['create', 'store']);

Route::resource('bounty', BountyController::class)
    ->only(['create', 'store']);

Route::resource('activity', ActivityController::class)
    ->only(['create', 'store']);


Route::post('/feed/{post}/comments', [CommentController::class, 'store'])
    ->name('comments.store');

Route::post('/posts/{post}/like', [FeedController::class, 'like'])
    ->name('posts.like');

Route::get('/players/{id}/activities', [PlayerController::class, 'wonActivities'])
    ->name('players.activities');

Route::get('/players/{id}/bounties', [PlayerController::class, 'bounties'])
    ->name('players.bounties');

Route::get('/players/{id}/seasons', [PlayerController::class, 'seasons'])
    ->name('players.seasons');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');
