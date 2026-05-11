<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            [
                'email' => $googleUser->getEmail(),
            ],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'profile_picture' => $googleUser->getAvatar(),
                'email_verified_at' => now()
            ]
        );

        Auth::login($user);

        return redirect('/');
    }
}
