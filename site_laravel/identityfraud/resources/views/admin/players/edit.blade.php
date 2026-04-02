@extends('layouts')
@section('title', 'Identity Fraud - Editar Jogador')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark overflow-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <a href="{{ route('admin.players.manage') }}"
                   class="inline-flex items-center gap-2 text-sm text-brand-muted hover:text-white transition mb-4 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Voltar
                </a>
                <h1 class="text-3xl font-bold text-white">Editar Jogador</h1>
                <p class="text-brand-muted mt-1">A editar: <span class="text-white font-semibold">{{ $player->name }}</span></p>
            </div>

            @if($errors->any())
                <div class="fade-up fade-up-d1 mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="fade-up fade-up-d1 mb-6 bg-emerald-500/10 border border-emerald-500/30 rounded-xl px-5 py-4 text-emerald-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-8 max-w-2xl mx-auto">
                <form method="POST" action="{{ route('players.update', $player->id) }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Avatar --}}
                    <div class="flex flex-col items-center gap-4 mb-2">
                        <div class="relative">
                            <img id="avatarPreview"
                                 src="{{ $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png') }}"
                                 class="w-28 h-28 rounded-full object-cover border-2 border-white/10">
                            <label class="absolute bottom-0 right-0 w-8 h-8 bg-brand-accent hover:bg-brand-glow rounded-full flex items-center justify-center cursor-pointer transition">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828A2 2 0 019 16H7v-2a2 2 0 01.586-1.414z"/>
                                </svg>
                                <input type="file" name="photo" accept="image/*" class="hidden" id="photoInput">
                            </label>
                        </div>
                        <p class="text-xs text-brand-muted">Clica no ícone para alterar a foto</p>
                    </div>

                    {{-- Nome --}}
                    <div>
                        <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Nome</label>
                        <input type="text" name="name" value="{{ old('name', $player->name) }}"
                               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                               placeholder="Nome do jogador" required>
                    </div>

                    {{-- Data de Nascimento --}}
                    <div>
                        <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Data de Nascimento</label>
                        <input type="date" name="birthdate" value="{{ old('birthdate', $player->birthdate ?? '') }}"
                            class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent [color-scheme:dark]">
                    </div>


                    {{-- Sobre --}}
                    <div>
                        <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Sobre</label>
                        <textarea name="about" rows="3"
                                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                                  placeholder="Breve descrição do jogador...">{{ old('about', $player->about ?? '') }}</textarea>
                    </div>

                    {{-- Remover foto atual --}}
                    @if($player->photo)
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="remove_photo" id="remove_photo" value="1"
                                   class="accent-brand-accent w-4 h-4">
                            <label for="remove_photo" class="text-sm text-brand-muted cursor-pointer">
                                Remover foto atual e usar a predefinida
                            </label>
                        </div>
                    @endif

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold text-sm rounded-lg transition btn-pulse">
                            Guardar Alterações
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
