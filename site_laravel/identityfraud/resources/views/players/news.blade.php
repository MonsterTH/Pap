@extends('layouts')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold text-white mb-8">
        Notícias sobre {{ $player->name }}
    </h1>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($news as $article)
            <a href="{{ route('news.show', $article->id) }}">
                            <div class="min-w-[300px] bg-brand-card rounded-xl overflow-hidden border border-white/5 hover:scale-[1.03] transition">
                                <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-32 object-cover">
                                <div class="p-3 border-t border-pink-500/40">
                                    <h2 class="text-sm font-semibold text-white">{{ $article->title }}</h2>
                                </div>
                            </div>
                        </a>
        @empty
            <p class="text-brand-muted">
                Nenhuma notícia encontrada para este jogador.
            </p>
        @endforelse

    </div>

</div>
@endsection
