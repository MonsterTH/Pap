<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PragmaRX\Google2FA\Google2FA;

class Toggle2fa extends Component
{
    public function toggle2FA()
    {
        $user = auth()->user;

        if ($user->has_2fa) {

            // DESATIVAR
            $user->update([
                'has_2fa' => false,
                'two_factor_secret' => null,
            ]);

            return;
        }

        // ATIVAR
        $google2fa = new Google2FA();

        $secret = $google2fa->generateSecretKey();

        $user->update([
            'has_2fa' => true,
            'two_factor_secret' => $secret,
        ]);

        session()->flash('qr_secret', $secret);
    }
    public function render(): View|Closure|string
    {
        return view('components.toggle2fa');
    }
}
