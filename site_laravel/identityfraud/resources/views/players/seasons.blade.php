@extends('layouts')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-white mb-8">
        Temporadas ganhas por {{ $player->name }}
    </h1>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($seasons as $season)
            <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-6 hover:scale-[1.02] transition">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-white">
                        {{ $season->name }}
                    </h2>

                    <span class="text-xs px-3 py-1 rounded-full bg-green-500/10 text-green-400 border border-green-500/30">
                        Vencida
                    </span>
                </div>

                <!-- INFO -->
                <div class="text-sm text-brand-muted space-y-2">

                    <p>
                        Ano:
                        <span class="text-white">
                            {{ $season->year }}
                        </span>
                    </p>

                    <p>
                        Vencedor:
                        <span class="text-white">
                            {{ $player->name }}
                        </span>
                    </p>

                </div>

                <!-- FOOTER -->
                <div class="mt-5 flex justify-between items-center">
                    <span class="text-xs text-brand-muted">
                        ID: {{ $season->id }}
                    </span>
                </div>

            </div>
        @empty
            <p class="text-brand-muted">
                Este jogador ainda não venceu nenhuma temporada.
            </p>
        @endforelse

    </div>

</div>
@endsection
