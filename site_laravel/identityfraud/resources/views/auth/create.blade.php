@extends('layouts')
@section('title', 'Identity Fraud - Login')
@section('content')
<main class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    @if(session('error'))
        <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('auth.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <input type="text" name="email" placeholder="Email" class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light" required>
        </div>
        <div class="mb-4">
            <input type="password" name="password" placeholder="Senha" class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light" required>
        </div>
        <div class="mb-4 flex items-center gap-2">
            <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300">
            <label for="remember" class="text-brand-light text-sm">Lembrar-me</label>
        </div>
        <button type="submit" class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition">Login</button>
    </form>
</main>
@endsection
