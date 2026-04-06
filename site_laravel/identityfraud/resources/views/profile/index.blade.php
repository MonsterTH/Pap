@extends('layouts')
    @section('title', 'Identity Fraud - Profile')
    @section('content')
    <main class="max-w-5xl mx-auto px-4 md:px-8 py-10">

        <div class="fade-up fade-up-d1 bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg relative overflow-visible z-10">

            <div class="fade-up fade-up-d2 flex items-center gap-4">
                <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/images/default.png') }}"
                    class="w-16 h-16 rounded-full bg-white/10">

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
                <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/images/default.png') }}"
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
@endsection
