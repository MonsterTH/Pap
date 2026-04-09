{{-- <nav class="sticky top-0 z-50 bg-brand-deeper/90 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4">
        <ul class="flex items-center justify-center gap-1 md:gap-2 py-3 overflow-x-auto text-sm md:text-base font-display">
            <li><a href="/" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Início</a></li>
            <li><a href="{{ route('players.index') }}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Jogadores</a></li>
            <li><a href="{{ route('news.index') }}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Notícias</a></li>
            <li><a href="{{ route('eviction.index') }}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Votos</a></li>
            <li><a href="{{ auth()->check() ? route('feed.index') : route('login') }}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Feed</a></li>
            <li><a href="{{ route('about') }}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Sobre</a></li>
            <li><a href="{{ auth()->check() ? route('profile.index') : route('login') }}" wire:navigate class="ml-2 px-4 py-2 bg-brand-accent/10 border border-brand-accent/30 rounded-full text-brand-accent font-semibold tracking-wide hover:bg-brand-accent/20 transition-all">Bem-vindo, {{ auth()->user()->name ?? 'Guest' }}</a></li>
        </ul>
    </div>
</nav> --}}

<nav x-data="{ open: false }"
     class="sticky top-0 z-50 bg-brand-deeper/90 backdrop-blur-xl border-b border-white/5">

    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between py-3">

        <!-- Burger Button -->
        <button @click="open = !open"
                class="md:hidden text-brand-light focus:outline-none">
            ☰
        </button>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex items-center justify-center gap-2 text-sm md:text-base font-display mx-auto">
            <li><x-nav-link href="{{ route('home') }}">Início</x-nav-link></li>
            <li><x-nav-link href="{{ route('players.index') }}">Jogadores</x-nav-link></li>
            <li><x-nav-link href="{{ route('news.index') }}">Notícias</x-nav-link></li>
            <li><x-nav-link href="{{ route('eviction.index') }}">Votos</x-nav-link></li>
            <li><x-nav-link href="{{ auth()->check() ? route('feed.index') : route('login') }}">Feed</x-nav-link></li>
            <li><x-nav-link href="{{ route('about') }}">Sobre</x-nav-link></li>
            <li>
                <a href="{{ auth()->check() ? route('profile.index') : route('login') }}"
                   class="ml-2 px-4 py-2 bg-brand-accent/10 border border-brand-accent/30 rounded-full text-brand-accent font-semibold
                    transition-all duration-300 ease-in-out
                    hover:bg-brand-accent hover:text-white hover:scale-105">
                    Bem-vindo, {{ auth()->user()->name ?? 'Guest' }}
                </a>
            </li>
        </ul>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
         class="md:hidden px-4 pb-4">
        <ul class="flex flex-col gap-3 text-sm font-display">
            <li><x-nav-link @click="open = false" href="{{ route('home') }}">hentai nefer</x-nav-link></li>
            <li><x-nav-link @click="open = false" href="{{ route('players.index') }}">Jogadores</x-nav-link></li>
            <li><x-nav-link @click="open = false" href="{{ route('news.index') }}">Notícias</x-nav-link></li>
            <li><x-nav-link @click="open = false" href="{{ route('eviction.index') }}">Votos</x-nav-link></li>
            <li><x-nav-link @click="open = false" href="{{ auth()->check() ? route('feed.index') : route('login') }}">Feed</x-nav-link></li>
            <li><x-nav-link @click="open = false" href="{{ route('about') }}">Sobre</x-nav-link></li>
            <li>
                <a @click="open = false"
                   href="{{ auth()->check() ? route('profile.index') : route('login') }}"
                   class="block px-4 py-2 bg-brand-accent/10 border border-brand-accent/30 rounded-full text-brand-accent font-semibold">
                    Bem-vindo, {{ auth()->user()->name ?? 'Guest' }}
                </a>
            </li>
        </ul>
    </div>
</nav>
