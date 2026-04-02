@extends('layouts')
@section('title', 'Identity Fraud - Gerir Eviction')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark overflow-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <h1 class="text-3xl font-bold text-white">Gerir Eviction</h1>
                <p class="text-brand-muted mt-1">Define os jogadores em votação. Máximo de 4 jogadores.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-emerald-500/10 border border-emerald-500/30 rounded-xl px-5 py-4 text-emerald-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- Jogadores em votação --}}
                <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-white">Em Votação</h2>
                        <span class="px-3 py-1 text-xs font-bold rounded-full
                            {{ $evictions->count() >= 4 ? 'bg-red-500/15 text-red-400 border border-red-500/30' : 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' }}">
                            {{ $evictions->count() }}/4
                        </span>
                    </div>

                    @if($evictions->isEmpty())
                        <div class="text-center py-12 text-brand-muted">
                            <svg class="w-10 h-10 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                            </svg>
                            <p class="text-sm">Nenhum jogador em votação.</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($evictions as $eviction)
                                <div class="flex items-center justify-between px-4 py-3 bg-white/5 hover:bg-white/8 border border-white/5 rounded-xl transition">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $eviction->player->photo ? asset('storage/' . $eviction->player->photo) : asset('storage/images/default.png') }}"
                                             class="w-10 h-10 rounded-full object-cover border border-white/10">
                                        <div>
                                            <p class="font-semibold text-white text-sm">{{ $eviction->player->name }}</p>
                                            <p class="text-xs text-brand-muted">{{ $eviction->votes_count ?? 0 }} votos</p>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('admin.eviction.remove', $eviction->player->id) }}"
                                        onsubmit="return confirm('Remover {{ $eviction->player->name }} da votação?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/25 text-red-400 border border-red-500/20 rounded-lg transition">
                                            Remover
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Reset votação --}}
                    @if($evictions->isNotEmpty())
                        <form method="POST" action="{{ route('admin.eviction.reset') }}"
                              onsubmit="return confirm('Tens a certeza? Isto vai apagar toda a votação atual.')"
                              class="mt-6">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full py-2.5 text-sm bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 rounded-xl transition font-semibold">
                                Resetar Votação
                            </button>
                        </form>
                    @endif
                </div>

                {{-- Adicionar jogador --}}
                <div class="fade-up fade-up-d3 bg-brand-card border border-white/10 rounded-2xl p-6">
                    <h2 class="text-lg font-bold text-white mb-6">Adicionar à Votação</h2>

                    @if($evictions->count() >= 4)
                        <div class="text-center py-12">
                            <p class="text-brand-muted text-sm">Já atingiste o máximo de 4 jogadores em votação.</p>
                            <p class="text-brand-muted text-xs mt-2">Remove um jogador para adicionar outro.</p>
                        </div>
                    @else
                        <form method="POST" action="{{ route('admin.eviction.store') }}" class="space-y-4">
                            @csrf

                            <div>
                                <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Selecionar Jogador</label>

                                {{-- Select escondido para o form --}}
                                <select name="player_id" id="playerSelect" class="hidden" required>
                                    <option value="" disabled selected>Escolhe um jogador...</option>
                                    @foreach($availablePlayers as $player)
                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                    @endforeach
                                </select>

                                {{-- Dropdown custom --}}
                                <div class="relative" id="customSelect">
                                    <button type="button" id="selectBtn"
                                            class="w-full flex items-center justify-between bg-white/5 border border-white/10 hover:border-white/20 rounded-lg px-4 py-2.5 text-sm text-white/40 focus:outline-none focus:ring-2 focus:ring-brand-accent transition">
                                        <span id="selectLabel">Escolhe um jogador...</span>
                                        <svg class="w-4 h-4 text-brand-muted transition-transform" id="selectArrow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <div id="selectDropdown"
                                        class="hidden absolute z-50 w-full mt-2 bg-brand-card border border-white/10 rounded-xl shadow-2xl overflow-hidden">
                                        @foreach($availablePlayers as $player)
                                            <div class="select-option flex items-center gap-3 px-4 py-3 hover:bg-white/10 cursor-pointer transition"
                                                data-value="{{ $player->id }}"
                                                data-label="{{ $player->name }}">
                                                <img src="{{ $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png') }}"
                                                    class="w-8 h-8 rounded-full object-cover border border-white/10">
                                                <span class="text-sm text-white">{{ $player->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <script>
                                const selectBtn      = document.getElementById('selectBtn');
                                const selectDropdown = document.getElementById('selectDropdown');
                                const selectArrow    = document.getElementById('selectArrow');
                                const selectLabel    = document.getElementById('selectLabel');
                                const playerSelect   = document.getElementById('playerSelect');

                                selectBtn.addEventListener('click', () => {
                                    selectDropdown.classList.toggle('hidden');
                                    selectArrow.classList.toggle('rotate-180');
                                });

                                document.querySelectorAll('.select-option').forEach(option => {
                                    option.addEventListener('click', () => {
                                        const value = option.dataset.value;
                                        const label = option.dataset.label;

                                        playerSelect.value = value;
                                        selectLabel.textContent = label;
                                        selectLabel.classList.remove('text-white/40');
                                        selectLabel.classList.add('text-white');

                                        selectDropdown.classList.add('hidden');
                                        selectArrow.classList.remove('rotate-180');
                                    });
                                });

                                // Fecha ao clicar fora
                                document.addEventListener('click', (e) => {
                                    if (!document.getElementById('customSelect').contains(e.target)) {
                                        selectDropdown.classList.add('hidden');
                                        selectArrow.classList.remove('rotate-180');
                                    }
                                });
                            </script>

                            @if($availablePlayers->isEmpty())
                                <p class="text-xs text-brand-muted">Todos os jogadores já estão em votação ou não existem jogadores.</p>
                            @else
                                <button type="submit"
                                        class="w-full py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold text-sm rounded-xl transition btn-pulse">
                                    Adicionar à Votação
                                </button>
                            @endif
                        </form>
                    @endif
                </div>

            </div>
        </main>
    </div>
@endsection
