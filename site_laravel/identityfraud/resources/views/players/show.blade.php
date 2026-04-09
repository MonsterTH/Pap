@extends('layouts')
@section('title', 'Identity Fraud - ' . $player->name)

@section('content')

<section class="relative min-h-screen overflow-hidden">

    {{-- Background glow --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[400px] rounded-full"
             style="background: radial-gradient(ellipse, rgba(230,57,70,0.08) 0%, transparent 70%);"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-4 md:px-8 py-16">

        {{-- Back button --}}
        <a href="{{ route('players.index') }}"
           class="inline-flex items-center gap-2 text-sm text-brand-muted hover:text-white transition mb-10 group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Voltar aos Jogadores
        </a>

        {{-- Hero card --}}
        <div class="relative bg-brand-card border border-white/10 rounded-3xl overflow-hidden mb-8 fade-up fade-up-d1">

            {{-- Top accent bar --}}
            <div class="h-1 w-full bg-gradient-to-r from-brand-accent via-brand-gold to-transparent"></div>

            <div class="flex flex-col md:flex-row gap-8 p-8 md:p-12">

                {{-- Avatar --}}
                <div class="flex-shrink-0 flex flex-col items-center gap-4">
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-brand-accent to-brand-gold blur-xl opacity-30 scale-110"></div>
                        <img
                            src="{{ $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png') }}"
                            alt="{{ $player->name }}"
                            class="relative w-36 h-36 md:w-44 md:h-44 rounded-full object-cover border-2 border-white/10 shadow-2xl">
                    </div>

                    {{-- Status badge --}}
                    @if(isset($player->status))
                        <span class="px-3 py-1 text-xs font-bold tracking-widest uppercase rounded-full
                            {{ $player->status === 'active' ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'bg-white/5 text-brand-muted border border-white/10' }}">
                            {{ $player->status === 'active' ? 'Ativo' : 'Inativo' }}
                        </span>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 flex flex-col justify-center">
                    <span class="text-xs font-bold tracking-[0.25em] uppercase text-brand-accent mb-2">Jogador</span>

                    <h1 class="text-4xl md:text-5xl font-extrabold font-display text-white glitch-text mb-1">
                        {{ $player->name }}
                    </h1>

                    @if(isset($player->username))
                        <p class="text-brand-muted text-lg mb-6">@{{ $player->username }}</p>
                    @else
                        <div class="mb-6"></div>
                    @endif

                    {{-- Meta info row --}}
                    <div class="flex flex-wrap gap-6 text-sm">
                        @if(isset($player->created_at))
                            <div class="flex items-center gap-2 text-brand-muted">
                                <svg class="w-4 h-4 text-brand-accent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Membro desde {{ $player->created_at->format('M Y') }}
                            </div>
                        @endif

                        @if(isset($player->about))
                            <div class="flex items-center gap-2 text-brand-muted">
                                <svg class="w-4 h-4 text-brand-accent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                {{ $player->about }}
                            </div>
                        @endif

                        @if(isset($player->role))
                            <div class="flex items-center gap-2 text-brand-muted">
                                <svg class="w-4 h-4 text-brand-accent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ $player->role }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8 fade-up fade-up-d2">
            @php
                $stats = [
                    [
                        'label' => 'Temporadas Ganhas',
                        'value' => $player->won_seasons_count ?? '—',
                        'link' => route('players.seasons', $player->id),
                        'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                    ],
                    [
                        'label' => 'Bountys',
                        'value' => $player->bounties_count ?? '—',
                        'link' => route('players.bounties', $player->id),
                        'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                    ],
                    [
                        'label' => 'Atividades Vencidas',
                        'value' => $player->activities_count ?? '—',
                        'link' => route('players.activities', $player->id),
                        'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'
                    ],
                ];
            @endphp

            @foreach($stats as $stat)
            <a href='{{ $stat["link"] }}'>
                <div class="bg-brand-card border border-white/10 rounded-2xl p-5 text-center card-hover">
                    <svg class="w-5 h-5 text-brand-accent mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}"/>
                    </svg>
                    <p class="text-2xl font-extrabold font-display text-white">{{ $stat['value'] }}</p>
                    <p class="text-xs text-brand-muted mt-1 uppercase tracking-widest">{{ $stat['label'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
