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

    if (! Auth::attempt($credentials, $this->remember)) {
        $this->addError('email', __('Verifique os seus dados.'));
        return;
    }

    $user = Auth::user();

    if ($user->has_2fa == 1)
    {
        session()->regenerate();

        $code = rand(100000, 999999);

        $user = User::find($user->id);

        $user->update([
            'two_factor_code' => $code,
            'two_factor_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new TwoFactorCodeMail($code));

        Auth::logout();

        session(['2fa:user:id' => $user->id]);

        $this->redirect(route('2fa.verify'), navigate: true);
    }
    else
    {
        redirect(route('profile.index'));
    }
}

    public function render()
    {
        return view('livewire.login');
    }
}
