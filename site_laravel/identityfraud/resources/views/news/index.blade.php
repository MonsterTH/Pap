@extends('layouts')
@section('title', 'Identity Fraud - News')

@section('content')

<!-- TRENDING -->
<section class="fade-up fade-up-d1 max-w-7xl mx-auto px-4 md:px-8 py-12">
    <h1 class="mb-5 text-2xl md:text-3xl font-bold"><span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">Trending</span></h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-brand-card rounded-2xl overflow-hidden border border-white/5 shadow-lg hover:scale-[1.03] transition">

                <img src="#" class="w-full h-48 object-cover">

                <div class="p-4">
                    <h2 class="font-bold text-white text-lg">titulo</h2>
                </div>

            </div>

    </div>
</section>

<hr class="border-white/10">

<!-- NOVIDADES -->
<section class="fade-up fade-up-d2 max-w-7xl mx-auto px-4 md:px-8 py-12">
    <h1 class="text-2xl md:text-3xl font-bold text-brand-accent mb-6">Novidades</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-brand-card rounded-xl overflow-hidden border border-white/5 hover:scale-[1.03] transition">

                <img src="#" class="w-full h-32 object-cover">

                <div class="p-3 border-t border-pink-500/40">
                    <h2 class="text-sm font-semibold text-white">titulo</h2>
                </div>

            </div>

    </div>
</section>

<!-- DRAMA -->
<section class="fade-up fade-up-d3 max-w-7xl mx-auto px-4 md:px-8 py-12">
    <h1 class="text-2xl md:text-3xl font-bold text-brand-accent mb-6">Drama</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-brand-card rounded-xl overflow-hidden border border-white/5 hover:scale-[1.03] transition">

                <img src="#" class="w-full h-32 object-cover">

                <div class="p-3 border-t border-purple-500/40">
                    <h2 class="text-sm font-semibold text-white">titulo</h2>
                </div>

            </div>

    </div>
</section>

@endsection
