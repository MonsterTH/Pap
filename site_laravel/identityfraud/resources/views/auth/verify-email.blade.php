@extends('layouts')

@section('title', 'Verificar Email')

@section('content')
<section class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg text-center">

    <h2 class="text-2xl font-bold mb-4 text-brand-light">Verifica o teu email</h2>

    <p class="text-brand-muted text-sm mb-6">
        Enviámos um link de verificação para o teu email. Clica no link para ativares a tua conta.
    </p>

    @if(session('status'))
        <div class="mb-4 px-4 py-3 bg-green-500/10 border border-green-500/30 text-green-400 rounded-lg">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/30 text-red-400 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="text-sm text-brand-muted hover:text-brand-light transition">
            Logout
        </button>
    </form>

</section>
@endsection
