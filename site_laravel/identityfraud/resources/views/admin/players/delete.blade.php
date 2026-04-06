@extends('layouts')
@section('title', 'Identity Fraud - Remover Jogador')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark overflow-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <h1 class="text-3xl font-bold text-white">Remover Jogador</h1>
                <p class="text-brand-muted mt-1">Pesquisa e remove jogadores da plataforma.</p>
            </div>

            {{-- Search bar --}}
            <div class="fade-up fade-up-d2 flex gap-3 mb-6 max-w-xl mx-auto">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Pesquisar jogador pelo nome..."
                    class="flex-1 bg-brand-card border border-white/10 rounded-lg px-4 py-2 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent">
            </div>

            {{-- Players list --}}
            <div class="fade-up fade-up-d3 bg-brand-card border border-white/10 rounded-2xl overflow-hidden max-w-2xl mx-auto">
                @forelse($players as $player)
                    <div class="player-row flex items-center justify-between px-6 py-4 border-b border-white/5 hover:bg-white/5 transition">
                        <div class="flex items-center gap-3">
                            <img src="{{ $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png') }}"
                                 class="w-10 h-10 rounded-full object-cover border border-white/10">
                            <span class="font-semibold text-white player-name">{{ $player->name }}</span>
                        </div>

                        <form method="POST" action="{{ route('players.destroy', $player->id) }}"
                              onsubmit="return confirm('Tens a certeza que queres remover {{ $player->name }}? Esta ação é irreversível.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/25 text-red-400 border border-red-500/20 rounded-lg transition font-semibold">
                                Remover
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="text-center py-16 text-brand-muted">
                        <p>Nenhum jogador encontrado.</p>
                    </div>
                @endforelse
            </div>

        </main>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            document.querySelectorAll('.player-row').forEach(row => {
                const name = row.querySelector('.player-name').textContent.toLowerCase();
                row.style.display = name.includes(query) ? '' : 'none';
            });
        });
    </script>
@endsection
