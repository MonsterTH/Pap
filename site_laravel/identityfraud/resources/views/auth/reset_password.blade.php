@extends('layouts')

@section('title', 'Identity Fraud - Nova senha')

@section('content')
<section class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg fade-up">

    <h2 class="text-2xl font-bold mb-4 text-brand-light text-center">
        Redefinir senha
    </h2>

    <p class="text-brand-muted text-sm text-center mb-6">
        Introduz a tua nova senha abaixo.
    </p>

    @if ($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <div class="mb-3">
            <input
                type="email"
                name="email"
                required
                placeholder="Email"
                value="{{ request()->email }}"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent">
        </div>

        <div class="mb-3">
            <input
                type="password"
                name="password"
                required
                placeholder="Nova senha"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent">
        </div>

        <div class="mb-4">
            <input
                type="password"
                name="password_confirmation"
                required
                placeholder="Confirmar senha"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent">
        </div>

        <button type="submit"
            class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition btn-pulse">
            Redefinir senha
        </button>
    </form>

    <div class="mt-4 text-center text-sm text-brand-muted">
        <a href="{{ route('login') }}" class="text-brand-accent hover:text-brand-glow font-semibold transition">
            Voltar ao login
        </a>
    </div>

</section>
@endsection
