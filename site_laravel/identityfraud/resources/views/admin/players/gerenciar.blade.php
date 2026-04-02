@extends('layouts')
@section('title', 'Identity Fraud - Gerenciar Jogadores')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark overflow-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <h1 class="text-3xl font-bold text-white">Gerenciar Jogadores</h1>
                <p class="text-brand-muted mt-1">Visualiza e gere todos os jogadores registados.</p>
            </div>

            {{-- Search / Filter bar --}}
            <div class="fade-up fade-up-d2 flex flex-col sm:flex-row gap-3 mb-6">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Pesquisar jogador..."
                    class="flex-1 bg-brand-card border border-white/10 rounded-lg px-4 py-2 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent">
            </div>

            {{-- Table --}}
            <div class="fade-up fade-up-d3 bg-brand-card border border-white/10 rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-white/10 text-brand-muted uppercase tracking-widest text-xs">
                            <th class="text-left px-6 py-4">Jogador</th>
                            <th class="text-left px-6 py-4">Data de Entrada</th>
                            <th class="text-right px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="playersTable">
                        @foreach($players as $player)
                            <tr class="player-row border-b border-white/5 hover:bg-white/5 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png') }}"
                                             class="w-9 h-9 rounded-full object-cover border border-white/10">
                                        <span class="font-semibold text-white player-name">{{ $player->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-brand-muted">
                                    {{ $player->created_at->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('players.show', $player->id) }}"
                                           class="px-3 py-1.5 text-xs bg-white/5 hover:bg-white/10 rounded-lg transition">
                                            Ver
                                        </a>
                                        <a href="{{ route('players.edit', $player->id) }}"
                                           class="px-3 py-1.5 text-xs bg-brand-accent/10 hover:bg-brand-accent/20 text-brand-accent rounded-lg transition">
                                            Editar
                                        </a>
                                        <form method="POST" action="{{ route('players.destroy', $player->id) }}"
                                              onsubmit="return confirm('Tens a certeza que queres remover este jogador?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                                                Remover
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($players->isEmpty())
                    <div class="text-center py-16 text-brand-muted">
                        <p>Nenhum jogador encontrado.</p>
                    </div>
                @endif
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
