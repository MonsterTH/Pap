@extends('layouts')
    @section('title', 'Identity Fraud - About')
    @section('content')
        <!-- HERO ABOUT -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 pt-12 pb-16">
            <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16">

                <!-- TEXTO -->
                <div class="fade-up fade-up-d1 flex-1">
                    <span class="inline-block px-3 py-1 mb-3 text-[10px] md:text-xs font-bold tracking-[0.2em] uppercase text-brand-accent bg-brand-accent/10 border border-brand-accent/20 rounded-full">
                        Sobre o Programa
                    </span>

                    <h1 class="font-display text-3xl md:text-5xl lg:text-6xl font-extrabold leading-[1.05] tracking-tight glitch-text">
                        O que é o
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">
                            Identity Fraud
                        </span>?
                    </h1>

                    <p class="fade-up fade-up-d3 mt-5 text-sm md:text-base text-brand-muted leading-relaxed max-w-lg">
                        Identity Fraud é um reality show de competição onde 16 competidores com identidades falsas tentam descobrir as identidades uns dos outros enquanto protegem as suas.
                    </p>

                    <p class="fade-up fade-up-d3 mt-4 text-sm md:text-base text-brand-muted leading-relaxed max-w-lg">
                        Cada competidor assume o papel de um investigador, tentando desvendar os segredos dos outros participantes para vencer a competição.
                    </p>

                    <p class="fade-up fade-up-d3 mt-4 text-sm md:text-base text-brand-muted leading-relaxed max-w-lg">
                        O programa combina mistério, estratégia e interação social, criando uma experiência envolvente tanto para competidores como para o público.
                    </p>
                </div>

                <!-- IMAGEM -->
                <div class="fade-up fade-up-d3 flex-1">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-brand-accent/20 via-transparent to-brand-gold/10 rounded-2xl blur-2xl"></div>

                        <img
                            src="storage/images/Imagem2.png"
                            class="relative w-full max-w-md mx-auto rounded-2xl shadow-2xl border border-white/5 object-cover"
                            alt="Imagem2"
                        >
                    </div>
                </div>

            </div>
        </section>
@endsection
