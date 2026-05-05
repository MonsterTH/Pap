@extends('layouts')

@section('title', 'Ativar 2FA')

@section('content')

<section class="max-w-2xl mx-auto px-4 md:px-8 py-12">

{{-- Mensagens de sucesso/erro --}}
    @if(session('status'))
        <div class="mb-6 px-4 py-3 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm text-center fade-up">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 px-4 py-3 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm fade-up">
            <ul class="space-y-1 text-center">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-brand-card border border-white/10 rounded-2xl p-8 shadow-lg fade-up fade-up-d1">

        {{-- HEADER --}}
        <div class="text-center mb-8">
            <h1 class="text-2xl md:text-3xl font-extrabold text-white">
                Ativar <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">2FA</span>
            </h1>
            <p class="text-brand-muted text-sm mt-2">
                Escaneia o QR Code com o Google Authenticator
            </p>
        </div>

        {{-- QR CODE --}}
        <div class="flex justify-center mb-6">
            <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                <img src="data:image/svg+xml;base64,{{ $qrImage }}" class="w-48 h-48">
            </div>
        </div>

        {{-- SECRET --}}
        <div class="text-center mb-6">
            <p class="text-xs text-brand-muted mb-2">Secret</p>
            <code class="bg-white/5 border border-white/10 px-3 py-1 rounded-lg text-white text-sm">
                {{ $secret }}
            </code>
        </div>

        {{-- FORM --}}
        <form method="POST" action="/2fa/confirm" class="space-y-4">
            @csrf

            <input
                type="text"
                name="code"
                placeholder="Código de 6 dígitos"
                class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-center text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                maxlength="6"
            >

            <button
                type="submit"
                class="w-full px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold rounded-lg transition btn-pulse"
            >
                Confirmar 2FA
            </button>
        </form>

    </div>

</section>

@endsection
