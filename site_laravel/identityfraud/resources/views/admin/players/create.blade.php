@extends('layouts')
@section('title', 'Identity Fraud - Adicionar Jogador')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark overflow-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <h1 class="text-3xl font-bold text-white">Adicionar Jogador</h1>
                <p class="text-brand-muted mt-1">Regista um novo jogador na plataforma.</p>
            </div>

            @if($errors->any())
                <div class="fade-up fade-up-d1 mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-8 max-w-2xl">
                <form method="POST" action="{{ route('players.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Avatar --}}
                    <div class="flex flex-col items-center gap-4 mb-2">
                        <img id="avatarPreview"
                             src="{{ asset('storage/images/default.png') }}"
                             class="w-24 h-24 rounded-full object-cover border-2 border-white/10">
                        <label class="cursor-pointer px-4 py-2 text-sm bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg transition text-brand-muted">
                            Escolher Foto
                            <input type="file" name="photo" accept="image/*" class="hidden" id="photoInput">
                        </label>
                    </div>

                    {{-- Nome --}}
                    <div>
                        <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Nome</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                               placeholder="Nome do jogador" required>
                    </div>

                    {{-- Data de Nascimento --}}
                    <div>
                        <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Data de Nascimento</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $player->birth_date ?? '') }}"
                            class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent [color-scheme:dark]">
                    </div>

                    {{-- Sobre --}}
                    <div>
                        <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Sobre</label>
                        <textarea name="about" rows="3"
                                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                                  placeholder="Breve descrição do jogador...">{{ old('about') }}</textarea>
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold text-sm rounded-lg transition btn-pulse">
                            Adicionar Jogador
                        </button>
                        <a href="{{ route('admin.players.manage') }}"
                           class="px-6 py-2.5 bg-white/5 hover:bg-white/10 text-brand-muted text-sm rounded-lg transition">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('photoInput').addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => document.getElementById('avatarPreview').src = e.target.result;
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
