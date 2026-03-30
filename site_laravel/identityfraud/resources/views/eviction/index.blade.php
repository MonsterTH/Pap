@extends('layouts')
@section('title', 'News - Identity Fraud')

@section('content')
<section class="max-w-7xl mx-auto px-4 md:px-8 py-12">

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            <div class="bg-brand-card rounded-2xl border border-white/5 overflow-hidden shadow-lg hover:scale-[1.03] transition duration-300">

                <div class="relative">
                    <img src="#"
                         class="w-full h-48 object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>

                <div class="p-4 text-center">
                    <h2 class="text-white font-semibold">
                        Nome
                    </h2>

                    <button onclick="#"
                        class="mt-3 inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wide bg-brand-accent hover:bg-brand-glow text-white rounded-lg transition-colors">

                        Votar

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>

                    </button>
                </div>

            </div>

    </div>

    <!-- ERRO -->
    <div class="text-center mt-6">
        <span id="erro" class="text-red-500 font-semibold"></span>
    </div>

    <hr class="border-white/10 my-8">

    <!-- BOTÃO -->
    <div class="text-center">
        <a href="players.php"
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
