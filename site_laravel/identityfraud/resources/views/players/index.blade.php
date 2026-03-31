@extends('layouts')
@section('title', 'Identity Fraud - Players')

@section('content')

<section class="max-w-7xl mx-auto px-4 md:px-8 py-16">

    <div class="text-center mb-12">
        <span class="inline-block px-3 py-1 text-xs font-bold tracking-[0.2em] uppercase text-brand-accent bg-brand-accent/10 border border-brand-accent/20 rounded-full">
            Participantes
        </span>

        <h1 class="mt-4 text-4xl md:text-6xl font-extrabold font-display">
            Conhece os <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">Jogadores</span>
        </h1>

        <p class="mt-4 text-brand-muted max-w-2xl mx-auto">
            Descobre todos os participantes da temporada de Identity Fraud.
        </p>
    </div>

    <!-- GRID PLAYERS -->
    <div id="playersGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">


    </div>

</section>

@endsection
