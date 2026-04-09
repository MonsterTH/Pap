<div class="flex min-h-screen bg-brand-dark">
    @include('partials.sidebar')

    <main class="flex-1 p-8 bg-brand-dark overflow-auto">

        @if(session('success'))
            <div class="mb-6 px-4 py-3 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="fade-up fade-up-d1 mb-8">
            <h1 class="text-3xl font-bold text-white">Histórico de Seasons</h1>
            <p class="text-brand-muted mt-1">Consulta todas as temporadas do reality.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($seasons as $season)
                <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-6 hover:scale-[1.02] transition">

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-white">{{ $season->name }}</h2>

                        @if($season->winner_id)
                            <span class="text-xs px-3 py-1 rounded-full bg-green-500/10 text-green-400 border border-green-500/30">
                                Finalizada
                            </span>
                        @else
                            <span class="text-xs px-3 py-1 rounded-full bg-yellow-500/10 text-yellow-400 border border-yellow-500/30">
                                Em curso
                            </span>
                        @endif
                    </div>

                    <div class="text-sm text-brand-muted space-y-2">
                        <p>Ano: <span class="text-white">{{ $season->year }}</span></p>
                        <p>Vencedor:
                            <span class="text-white">
                                {{ $season->winner ? $season->winner->name : 'Ainda não definido' }}
                            </span>
                        </p>
                    </div>

                    <div class="mt-5 flex justify-between items-center">
                        <span class="text-xs text-brand-muted">ID: {{ $season->id }}</span>

                        @if(!$season->winner_id)
                            <button
                                onclick="Livewire.dispatchTo('finish-season', 'openFinishModal', { id: {{ $season->id }} })"
                                class="text-xs font-semibold px-4 py-2 rounded-lg bg-brand-accent text-white hover:bg-brand-glow hover:scale-105 transition-all duration-300">
                                Finalizar
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @if($seasons->isEmpty())
            <div class="mt-10 text-center text-brand-muted">
                Nenhuma season encontrada.
            </div>
        @endif
    </main>

    @livewire('finish-season')
</div>
