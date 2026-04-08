<aside class="fade-up fade-up-d1 w-64 bg-brand-card p-6 flex flex-col">
    <div class="mb-6">
        <a href="{{ route('admin.index') }}">
        <img src="{{ asset('images/LogoTipo.png') }}" alt="Identity Fraud Logo" class="w-32 mx-auto">
        </a>
    </div>

    <nav class="flex-1">

        <div class="fade-up fade-up-d1">
            <h3 class="text-brand-accent font-bold mb-2">Jogadores</h3>
            <a href="{{ route('admin.players.manage') }}"  class="block px-3 py-2 rounded hover:bg-white/10">Gerenciar</a>
            <a href="{{ route('players.create') }}"         class="block px-3 py-2 rounded hover:bg-white/10">Adicionar</a>
            <a href="{{ route('admin.players.remove') }}"   class="block px-3 py-2 rounded hover:bg-white/10">Remover</a>
            <a href="{{ route('admin.players.consulta') }}" class="block px-3 py-2 rounded hover:bg-white/10">Consulta</a>
        </div>

        <div class="fade-up fade-up-d2">
            <h3 class="text-brand-accent font-bold mt-6 mb-2">Eventos</h3>
            <a href="{{ route('admin.eviction.index') }}" class="block px-3 py-2 rounded hover:bg-white/10">Votações</a>
            <a href="{{ route('activity.create') }}" class="block px-3 py-2 rounded hover:bg-white/10">Atividades</a>
            <a href="{{ route('bounty.create') }}" class="block px-3 py-2 rounded hover:bg-white/10">Bounty's</a>
            <a href="{{ route('season.create') }}" class="block px-3 py-2 rounded hover:bg-white/10">Seasons</a>
        </div>

        <div class="fade-up fade-up-d3">
            <h3 class="text-brand-accent font-bold mt-6 mb-2">Misc</h3>
            <a href="{{ route('seasons.index') }}" class="block px-3 py-2 rounded hover:bg-white/10">Histórico de Seasons</a>
            <a href="{{ route('news.create') }}" class="block px-3 py-2 rounded hover:bg-white/10">Notícias</a>
            <a href="{{ route('adminregister') }}" class="block px-3 py-2 rounded hover:bg-white/10">Criar Admin</a>
            <a href="/" class="block px-3 py-2 rounded hover:bg-white/10">Página Principal</a>
        </div>
    </nav>

    <p class="mt-auto text-center text-sm text-white/60">Bem-vindo, {{ auth()->user()->name ?? 'Admin' }}</p>
</aside>

