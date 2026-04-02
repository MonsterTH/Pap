@extends('layouts')
@section('title', 'Identity Fraud - Eviction')

@section('content')
<section class="max-w-7xl mx-auto px-4 md:px-8 py-12">

    <div class="fade-up fade-up-d1 text-center mb-12">
        <span class="inline-block px-3 py-1 text-xs font-bold tracking-[0.2em] uppercase text-brand-accent bg-brand-accent/10 border border-brand-accent/20 rounded-full">
            Votação
        </span>
        <h1 class="mt-4 text-4xl md:text-6xl font-extrabold font-display">
            Quem vai ser <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">eliminado?</span>
        </h1>
        <p class="mt-4 text-brand-muted max-w-xl mx-auto">
            Vota no jogador que queres ver eliminado. Cada jogador só pode votar uma vez.
        </p>
    </div>

    @if(session('success'))
        <div class="fade-up fade-up-d1 max-w-xl mx-auto mb-8 bg-emerald-500/10 border border-emerald-500/30 rounded-xl px-5 py-4 text-emerald-400 text-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fade-up fade-up-d1 max-w-xl mx-auto mb-8 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm text-center">
            {{ session('error') }}
        </div>
    @endif

    @if($evictions->isEmpty())
        <div class="text-center py-24 text-brand-muted">
            <p class="text-lg">Não há nenhuma votação ativa de momento.</p>
        </div>
    @else
        <div class="fade-up fade-up-d2 grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($evictions as $eviction)
                <div class="bg-brand-card rounded-2xl border border-white/5 overflow-hidden shadow-lg hover:scale-[1.03] transition duration-300 card-hover">

                    <div class="relative">
                        <img src="{{ $eviction->player->photo ? asset('storage/' . $eviction->player->photo) : asset('storage/images/default.png') }}"
                             class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                        {{-- Contagem de votos --}}
                        <div class="absolute top-3 right-3 px-2 py-1 bg-black/50 backdrop-blur-sm rounded-full text-xs text-white/80 border border-white/10">
                            {{ $eviction->votes_count ?? 0 }} voto/s
                        </div>
                    </div>

                    <div class="p-4 text-center">
                        <h2 class="text-white font-semibold mb-3">
                            {{ $eviction->player->name }}
                        </h2>

                        @auth
                            @if(auth()->user()->is_admin)
                                <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wide bg-white/5 text-white/30 rounded-lg cursor-not-allowed">
                                    Admin não pode votar
                                </span>
                            @elseif($votedPlayerId === $eviction->player_id)
                                <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wide bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 rounded-lg">
                                    ✓ Votaste
                                </span>
                            @elseif($votedPlayerId !== null)
                                <span class="inline-flex items-center px-4 py-2 text-sm font-bold uppercase tracking-wide bg-white/5 text-white/30 rounded-lg cursor-not-allowed">
                                    Já votaste
                                </span>
                            @else
                                <form method="POST" action="{{ route('eviction.vote', $eviction->player_id) }}">
                                    @csrf
                                    <button type="submit"
                                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wide bg-brand-accent hover:bg-brand-glow text-white rounded-lg transition btn-pulse">
                                        Votar
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path d="m9 18 6-6-6-6"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wide bg-brand-accent hover:bg-brand-glow text-white rounded-lg transition">
                                Login para votar
                            </a>
                        @endauth
                    </div>

                </div>
            @endforeach
        </div>
    @endif

    <hr class="border-white/10 my-10">

    <div class="fade-up fade-up-d3 text-center">
        <a href="{{ route('players.index') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-brand-accent text-white font-bold uppercase tracking-wide rounded-lg hover:bg-brand-glow transition">
            Ver Participantes
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </a>
    </div>

</section>
@endsection
