<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TwoFactorVerify extends Component
{
    public $code;

    public function verify()
    {
        $userId = session('2fa:user:id');

        if (!$userId) {
            return redirect('/login');
        }

        $user = User::find($userId);

        if (
            $user &&
            $user->two_factor_code === $this->code &&
            now()->lt($user->two_factor_expires_at)
        ) {
            // limpar código
            $user->update([
                'two_factor_code' => null,
                'two_factor_expires_at' => null
            ]);

            Auth::login($user);

            session()->forget('2fa:user:id');

            return redirect('/');
        }

        $this->addError('code', 'Código inválido ou expirado');
    }

    public function render()
    {
        return view('livewire.two-factor-verify');
    }
}
