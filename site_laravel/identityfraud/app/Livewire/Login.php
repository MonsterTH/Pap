<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Layout;

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

        session()->regenerate();

        $user = Auth::user();

        // Verifica se o usuário é administrador
        if ($user instanceof \App\Models\User && $user->isAdmin())
        {
            $this->redirect(route('admin.index'), navigate: true);
            return;
        }

        // Caso contrário, redireciona para home normal
        $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.login');
    }
}
