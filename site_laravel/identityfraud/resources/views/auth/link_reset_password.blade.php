@extends('layouts')

@section('title', 'Identity Fraud - Recuperar senha')

@section('content')
<section class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg fade-up">

    <h2 class="text-2xl font-bold mb-4 text-brand-light text-center">
        Recuperar senha
    </h2>

    <p class="text-brand-muted text-sm text-center mb-6">
        Introduz o teu email e enviaremos um link para redefinir a tua senha.
    </p>

    @if (session('status'))
        <div class="mb-4 px-4 py-3 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <input
                type="email"
                name="email"
                required
                placeholder="Email"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent">
        </div>

        <button type="submit"
            class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition btn-pulse">
            Enviar link de redefinição
        </button>
    </form>

    <div class="mt-4 text-center text-sm text-brand-muted">
        Lembrou-se da senha?
        <a href="{{ route('login') }}" class="text-brand-accent hover:text-brand-glow font-semibold transition">
            Voltar ao login
        </a>
    </div>

</section>
@endsection
