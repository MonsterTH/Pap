@extends('layouts')
@section('title', 'Identity Fraud - Players')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-white mb-8">
        Atividades vencidas por {{ $player->name }}
    </h1>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($activities as $activity)
            <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-6 hover:scale-[1.02] transition">

                <!-- HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-white">
                        {{ $activity->name }}
                    </h2>
                </div>

                <!-- INFO -->
                <div class="text-sm text-brand-muted space-y-2">
                    <p>
                        Data:
                        <span class="text-white">
                            {{ $activity->created_at->format('d/m/Y') }}
                        </span>

                        <div>
                        Descrição:
                        <span class="text-white">
                            {{ $activity->description}}
                        </span>
                        </div>
                    </p>

                    @if($activity->season)
                        <p>
                            Temporada:
                            <span class="text-white">
                                {{ $activity->season->name }}
                            </span>
                        </p>
                    @endif
                </div>

                <!-- FOOTER -->
                <div class="mt-5 flex justify-between items-center">
                    <span class="text-xs text-brand-muted">
                        ID: {{ $activity->id }}
                    </span>

                    {{-- <a href="{{ route('activity.show', $activity->id) }}"
                       class="text-sm text-brand-accent hover:underline">
                        Ver detalhes →
                    </a> --}}
                </div>

            </div>
        @empty
            <p class="text-brand-muted">
                Este jogador ainda não venceu nenhuma atividade.
            </p>
        @endforelse

    </div>

</div>
@endsection
