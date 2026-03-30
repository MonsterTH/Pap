<nav class="sticky top-0 z-50 bg-brand-deeper/90 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4">
        <ul class="flex items-center justify-center gap-1 md:gap-2 py-3 overflow-x-auto text-sm md:text-base font-display">
            <li><a href="/" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Início</a></li>
            <li><a href="{{route('players.index')}}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Jogadores</a></li>
            <li><a href="{{route('news.index')}}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Notícias</a></li>
            <li><a href="{{route('eviction.index')}}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Votos</a></li>
            <li><a href="{{route('feed.index')}}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Feed</a></li>
            <li><a href="about" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Sobre</a></li>
            <li><a href="{{ auth()->check() ? route('profile.index') : route('login') }}" wire:navigate class="ml-2 px-4 py-2 bg-brand-accent/10 border border-brand-accent/30 rounded-full text-brand-accent font-semibold tracking-wide hover:bg-brand-accent/20 transition-all">Bem-vindo, {{ auth()->user()->name ?? 'Guest' }}</a></li>
        </ul>
    </div>
</nav>
