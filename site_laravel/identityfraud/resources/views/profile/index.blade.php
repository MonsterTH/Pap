@extends('layouts')
    @section('title', 'Identity Fraud - Profile')
    @section('content')
    <main class="max-w-5xl mx-auto px-4 md:px-8 py-10">

        <div class="fade-up fade-up-d1 bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg relative overflow-visible z-10">

            <div class="fade-up fade-up-d2 flex items-center gap-4">
                <img src="{{ auth()->user()->profile_picture ? (Str::startsWith(auth()->user()->profile_picture, 'http') ? auth()->user()->profile_picture : asset('storage/' . auth()->user()->profile_picture)) : asset('storage/images/default.png') }}" class="w-16 h-16 rounded-full bg-white/10">

                <div>
                    <h1 class="text-xl font-bold"> {{ auth()->user()->name }}</h1>
                    <p class="text-sm text-brand-muted">{{ auth()->user()->created_at->format('j F, Y') }}</p>
                    <p class="text-sm text-brand-light">{{ auth()->user()->dateofentry }}</p>
                </div>
            </div>

            <!-- DROPDOWN -->
            <div class="fade-up fade-up-d2 absolute top-4 right-4 z-50">
                <button id='dropdownBtn' class="text-xl px-3 py-1 bg-white/10 rounded-lg hover:bg-white/20 transition">
                    ≡
                </button>

                <div id='dropdownMenu' class="fade-up fade-up-d1 hidden absolute right-0 mt-2 bg-brand-card border border-white/10 rounded-lg shadow-lg p-2 space-y-1 w-40 z-50">
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm hover:bg-white/10 rounded">Editar Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-sm hover:bg-white/10 rounded">
                            Sair
                        </button>
                    </form>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.index') }}" class="block px-3 py-2 text-sm hover:bg-white/10 rounded">
                            Admin
                        </a>
                    @endif
                </div>
            </div>

            <script>
                const btn = document.getElementById("dropdownBtn");
                const menu = document.getElementById("dropdownMenu");

                btn.addEventListener("click", () => {
                    menu.classList.toggle("hidden");
                });
            </script>
        </div>

    </main>

    <!-- POST INPUT -->
    <section class="fade-up fade-up-d3 max-w-3xl mx-auto px-4 md:px-8 pb-10 relative z-0">

        <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

            <div class="flex items-center gap-3 mb-4">
                <img src="{{ auth()->user()->profile_picture ? (Str::startsWith(auth()->user()->profile_picture, 'http') ? auth()->user()->profile_picture : asset('storage/' . auth()->user()->profile_picture)) : asset('storage/images/default.png') }}"
                    class="w-10 h-10 rounded-full bg-white/10">
                <p class="font-semibold">{{ auth()->user()->name }}</p>
            </div>

            <form method="POST" action="{{ route('feed.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <textarea
                    name="content"
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-sm text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                    maxlength="500"
                    placeholder="What's going on your mind?"></textarea>

                <hr class="border-white/10">

                <div class="flex items-center justify-between">

                    <label class="cursor-pointer flex items-center gap-2 text-sm hover:text-brand-accent transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="stroke: url(#gradIcon);">
                            <defs>
                                <linearGradient id="gradIcon" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#e63946"/>
                                    <stop offset="100%" stop-color="#f4c542"/>
                                </linearGradient>
                            </defs>
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h3l2-3h8l2 3h3a2 2 0 0 1 2 2z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                        Add Image
                        <input type="file" name="image" class="hidden">
                    </label>

                    <button type="submit" class="px-5 py-2 bg-brand-accent hover:bg-brand-glow text-white font-bold uppercase text-sm rounded-lg transition">
                        Post
                    </button>

                </div>
            </form>

        </div>
    </section>
     <div class="fade-up fade-up-d2 space-y-8 mt-4">

        @foreach ($posts as $post)
            @if($post->image == Null)
                <div class="max-w-lg mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/images/default.png') }}"
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
                    <img class="w-10 h-10 rounded-full bg-white/10" src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/images/default.png') }}">
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
