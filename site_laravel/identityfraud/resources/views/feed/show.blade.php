    @extends('layouts')
    @section('title', 'News - Identity Fraud')

    @section('content')

<main class="max-w-7xl mx-auto px-4 md:px-8 py-10 grid md:grid-cols-3 gap-8">

        <!-- SIDE INFO -->
        <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg h-fit">
            <img class="w-16 h-16 rounded-full bg-white/10 mb-4">
            <h1 class="text-lg font-bold">{{ $post->user->name }}</h1>
            <p class="text-sm text-brand-muted mt-2">Posts: X | {{ $post->user->dateofentry }}</p>
            <hr class="my-4 border-white/10">
        </div>

        <!-- CENTER CONTENT -->
        <div class="md:col-span-2 space-y-6">

            <!-- POST HEADER -->
            <div class="flex items-center gap-3 bg-brand-card border border-white/5 rounded-xl p-4">

                <a href="{{ route('feed.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" /></svg>
                </a>

                <div class="flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full bg-white/10">
                    <div>
                        <p class="font-semibold">{{ $post->user->name }}</p>
                        <p class="text-xs text-brand-muted">{{ $post->date }}</p>
                        <p class="text-xs text-brand-muted">{{ $post->comments->count() }} Comentários</p>
                    </div>
                </div>

            </div>

            <!-- POST -->
            <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                <p class="text-brand-light leading-relaxed">
                    {{$post->content}}
                </p>

                <hr class="my-4 border-white/10">

                <div class="flex justify-between text-sm">

                    <livewire:like-button :post="$post" :key="$post->id" />

                    <button class="flex items-center gap-2 hover:text-brand-accent transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" /></svg>
                        <span>Share</span>
                    </button>

                </div>

            </div>

            <!-- COMMENT INPUT -->
            <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                <div class="flex items-center gap-3 mb-4">
                    <img class="w-10 h-10 rounded-full bg-white/10">
                    <p class="font-semibold">{{ auth()->user()->name }}</p>
                </div>

                <form method="POST" action="{{ route('comments.store', $post->id) }}" class="space-y-4">

                    <textarea name="content"
                        class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-sm text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                        placeholder="Give Us Your Opinion">
                    </textarea>

                    <div class="flex justify-end">
                        <button class="px-4 py-2 bg-brand-accent hover:bg-brand-glow rounded-lg font-bold text-sm transition">
                            Send
                        </button>
                    </div>

                </form>

            </div>

            <!-- COMMENTS -->
            <div class="space-y-4">

                <!-- COMMENT -->
                @foreach($post->comments as $comment)
                <div class="bg-brand-card border border-white/5 rounded-xl p-4">

                    <div class="flex items-center gap-3 mb-2">
                        <img class="w-8 h-8 rounded-full bg-white/10">
                        <div>
                            <p class="text-sm font-semibold">{{ $comment->user->name }}</p>
                            <p class="text-xs text-brand-muted">{{$comment->created_at}}</p>
                        </div>
                    </div>

                    <p class="text-sm text-brand-light">
                        {{$comment->content}}
                    </p>

                    <hr class="my-3 border-white/10">

                    <div class="flex justify-between text-xs">

                        <button class="flex items-center gap-2 hover:text-brand-accent transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                            <span>0</span>
                        </button>

                        <button class="flex items-center gap-2 hover:text-brand-accent transition">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" /></svg>
                            <span>Share</span>
                        </button>

                    </div>

                </div>
                @endforeach

            </div>

        </div>

    </main>
    @endsection
