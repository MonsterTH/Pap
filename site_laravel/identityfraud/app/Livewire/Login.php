<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorCodeMail;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PragmaRX\Google2FA\Google2FA;

#[Layout('layouts')]
class Login extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|min:6')]
    public string $password = '';

    public bool $remember = false;

    public function authenticate(): void
{
    $this->validate();

    $credentials = [
        'email' => strtolower($this->email),
        'password' => $this->password,
    ];

    if (!Auth::attempt($credentials, $this->remember)) {
        $this->addError('email', __('Verifique os seus dados.'));
        return;
    }

    $user = Auth::user();

    // 🔐 SE TEM 2FA ATIVO
    if ($user->two_factor_enabled) {

        // guardar user temporário
        session(['2fa_user' => $user->id]);

        // LOGOUT imediato (CRÍTICO)
        Auth::logout();

        session()->regenerate();

        // redirecionar para 2FA
        $this->redirect('/2fa', navigate: true);

        return;
    }

    // ❌ sem 2FA → login normal
    session()->regenerate();

    $this->redirect(route('profile.index'), navigate: true);
}

    public function render()
    {
        return view('livewire.login');
    }
}
