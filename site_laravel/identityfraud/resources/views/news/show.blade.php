@extends('layouts')
@section('title', 'Identity Fraud - News')

@section('content')

<section class="max-w-4xl mx-auto px-4 md:px-8 py-16">

    <!-- BACK -->
    <a href="{{ route('news.index') }}"
       class="inline-flex items-center gap-2 text-sm text-brand-muted hover:text-brand-accent transition mb-6">
        ← Voltar
    </a>

    <!-- ARTICLE CARD -->
    <div class="bg-brand-card border border-white/5 rounded-2xl overflow-hidden shadow-lg">

        <!-- IMAGE -->
        <img src="#" class="w-full h-64 md:h-80 object-cover">

        <!-- CONTENT -->
        <div class="p-6 md:p-8">

            <!-- TITLE -->
            <h1 class="text-3xl md:text-4xl font-extrabold leading-tight">
                {{ $news->title }}
            </h1>

            <!-- DATE -->
            <p class="mt-3 text-sm text-brand-muted">
                Publicado em {{ $news->created_at->format('d/m/Y') }}
            </p>

            <!-- DIVIDER -->
            <hr class="my-6 border-white/10">

            <!-- ARTICLE BODY -->
            <div class="space-y-4 text-brand-light leading-relaxed text-base md:text-lg">

                {{ $news->description }}

            </div>

        </div>

    </div>

</section>

@endsection
