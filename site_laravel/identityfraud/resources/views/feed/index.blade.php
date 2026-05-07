    @extends('layouts')
    @section('title', 'Identity Fraud - Feed')

    @section('content')

    <!-- SIDE INFO -->
    <div class="fade-up fade-up-d1 mt-7 max-w-3xl mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 text-center shadow-lg">

        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/images/default.png') }}"
            class="w-20 h-20 rounded-full mx-auto mb-4 object-cover bg-white/10">

        <h1 class="text-lg font-bold text-white">{{auth()->user()->name}}</h1>

        <p class="text-sm text-brand-muted mt-2">
            Posts: X | Likes: 0
        </p>

        <hr class="my-4 border-white/10">
    </div>

    <!-- POSTS -->
    <div class="fade-up fade-up-d2 space-y-8 mt-8">

        @foreach ($posts as $post)
            @if($post->image == Null)
                <div class="max-w-lg mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ auth()->user()->profile_picture ? (Str::startsWith(auth()->user()->profile_picture, 'http') ? auth()->user()->profile_picture : asset('storage/' . auth()->user()->profile_picture)) : asset('storage/images/default.png') }}"
                            class="w-10 h-10 rounded-full bg-white/10">
                        <div>
                            <p class="text-white font-semibold">{{ $post->user->name }}</p>
                            <p class="text-xs text-brand-muted">{{ $post->date }}</p>
                        </div>
                    </div>

                    <p class="text-brand-light leading-relaxed">
                        {{ $post->content }}
                    </p>

                    <hr class="my-4 border-white/10">

                    <div class="flex justify-between text-sm">

                    <livewire:like-button :post="$post" :key="$post->id" />

                    <a href="{{ route('feed.show', $post->id) }}">
                    <button class="flex items-center gap-2 hover:text-brand-accent transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /> </svg>
                        <span>COMMENTS</span>
                    </button>
                    </a>

                        <button class="flex items-center gap-2 hover:text-brand-accent transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" /></svg>
                            <span>Share</span>
                        </button>

                    </div>

                </div>
            @else
                <div class="max-w-lg mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ auth()->user()->profile_picture ? (Str::startsWith(auth()->user()->profile_picture, 'http') ? auth()->user()->profile_picture : asset('storage/' . auth()->user()->profile_picture)) : asset('storage/images/default.png') }}"
                    <div>
                        <p class="text-white font-semibold">{{ $post->user->name }}</p>
                        <p class="text-xs text-brand-muted">{{ $post->date }}</p>
                    </div>
                </div>

                <p class="text-brand-light leading-relaxed mb-4">
                    {{$post->content }}
                </p>

                <img src="{{'storage/' . $post->image }}"
                    class="w-full max-h-96 object-cover rounded-xl border border-white/5 mb-4">

                <hr class="my-4 border-white/10">

                <div class="flex justify-between text-sm">

                    <livewire:like-button :post="$post" :key="$post->id" />

                    <a href="{{ route('feed.show', $post->id) }}">
                    <button class="flex items-center gap-2 hover:text-brand-accent transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /> </svg>
                        <span>COMMENTS</span>
                    </button>
                    </a>

                        <button class="flex items-center gap-2 hover:text-brand-accent transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" /></svg>
                            <span>Share</span>
                        </button>

                    </div>

            </div>
            @endif
        @endforeach

        <div class="mt-8 flex justify-center">
            {{ $posts->links() }}
        </div>

    </div>
    @endsection
