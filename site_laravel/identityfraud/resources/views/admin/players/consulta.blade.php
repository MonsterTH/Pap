@extends('layouts')
@section('title', 'Identity Fraud - Consulta de Jogadores')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark overflow-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <h1 class="text-3xl font-bold text-white">Consulta de Jogadores</h1>
                <p class="text-brand-muted mt-1">Pesquisa e consulta informações de qualquer jogador.</p>
            </div>

            {{-- Search --}}
            <div class="fade-up fade-up-d2 max-w-xl mb-8">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Pesquisar pelo nome..."
                    class="w-full bg-brand-card border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent">
            </div>

            {{-- Players grid --}}
            <div id="playersGrid" class="fade-up fade-up-d3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($players as $player)
                    <div class="player-card bg-brand-card border border-white/10 rounded-2xl p-5 card-hover">

                        <div class="flex items-center gap-4 mb-4">
                            <img src="{{ $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png') }}"
                                 class="w-14 h-14 rounded-full object-cover border border-white/10">
                            <div>
                                <h2 class="font-bold text-white player-name">{{ $player->name }}</h2>
                                @if(isset($player->username))
                                    <p class="text-xs text-brand-muted">@{{ $player->username }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-2 text-sm text-brand-muted border-t border-white/5 pt-4">
                            <div class="flex justify-between">
                                <span>Membro desde</span>
                                <span class="text-white">{{ $player->created_at->format('d/m/Y') }}</span>
                            </div>
                            @if(isset($player->status))
                                <div class="flex justify-between">
                                    <span>Estado</span>
                                    @if($player->status === 'active')
                                        <span class="text-emerald-400">Ativo</span>
                                    @else
                                        <span class="text-brand-muted">Inativo</span>
                                    @endif
                                </div>
                            @endif
                            @if(isset($player->about))
                                <p class="text-xs pt-1 text-white/50 line-clamp-2">{{ $player->about }}</p>
                            @endif
                        </div>

                        <a href="{{ route('players.show', $player->id) }}"
                           class="mt-4 block text-center text-xs py-2 bg-white/5 hover:bg-brand-accent/10 hover:text-brand-accent border border-white/10 hover:border-brand-accent/30 rounded-lg transition">
                            Ver Perfil Completo
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 text-brand-muted">
                        <p>Nenhum jogador encontrado.</p>
                    </div>
                @endforelse
            </div>

        </main>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            document.querySelectorAll('.player-card').forEach(card => {
                const name = card.querySelector('.player-name').textContent.toLowerCase();
                card.style.display = name.includes(query) ? '' : 'none';
            });
        });
    </script>
@endsection
