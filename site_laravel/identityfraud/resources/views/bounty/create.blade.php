@extends('layouts')
@section('title', 'Identity Fraud - Criar Bounty')

@section('content')
<div class="flex min-h-screen bg-brand-dark">
    @include('partials.sidebar')

    <main class="flex-1 p-8 bg-brand-dark overflow-auto">

        <!-- HEADER -->
        <div class="fade-up fade-up-d1 mb-8">
            <h1 class="text-3xl font-bold text-white">Criar Bounty</h1>
            <p class="text-brand-muted mt-1">Define uma missão entre jogadores.</p>
        </div>

        <!-- ERRORS -->
        @if($errors->any())
            <div class="fade-up fade-up-d1 mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- FORM -->
        <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-8 max-w-2xl">
            <form method="POST" action="{{ route('bounty.store') }}" class="space-y-6">
                @csrf

                <!-- PLAYER -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Jogador</label>
                    <select name="player_id"
                            class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-brand-accent">
                        <option value="">Selecionar jogador</option>

                        @foreach($players as $player)
                            <option value="{{ $player->id }}" {{ old('player_id') == $player->id ? 'selected' : '' }}>
                                {{ $player->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- TARGET -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Alvo</label>
                    <select name="target_id"
                            class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-brand-accent">
                        <option value="">Selecionar alvo</option>

                        @foreach($players as $player)
                            <option value="{{ $player->id }}" {{ old('target_id') == $player->id ? 'selected' : '' }}>
                                {{ $player->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- COMPLETED -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Estado</label>

                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="completed" value="0"
                                   {{ old('completed', 0) == 0 ? 'checked' : '' }}
                                   class="accent-brand-accent">
                            <span class="text-sm text-white">Por cumprir</span>
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="completed" value="1"
                                   {{ old('completed') == 1 ? 'checked' : '' }}
                                   class="accent-green-500">
                            <span class="text-sm text-white">Concluído</span>
                        </label>
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold text-sm rounded-lg transition btn-pulse">
                        Criar Bounty
                    </button>
                </div>

            </form>
        </div>

    </main>
</div>
@endsection
