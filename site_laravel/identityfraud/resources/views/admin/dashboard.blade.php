@extends('layouts')

@section('content')
    <div class="flex min-h-screen bg-brand-dark">

        {{-- Sidebar --}}
        <aside class="w-64 bg-brand-card p-6 flex flex-col">
            <div class="mb-6">
                <img src="/scripts/Pap/imgs/LogoTipo.png" alt="Logo" class="w-32 mx-auto">
            </div>

            <nav class="flex-1">
                <h3 class="text-brand-accent font-bold mb-2">Jogadores</h3>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Gerenciar</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Adicionar</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Remover</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Consulta</a>

                <h3 class="text-brand-accent font-bold mt-6 mb-2">Eventos</h3>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Votações</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Atividades</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Bounty's</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Seasons</a>

                <h3 class="text-brand-accent font-bold mt-6 mb-2">Misc</h3>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Histórico de Seasons</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Notícias</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Criar Admin</a>
                <a href="/scripts/Pap/home.php" class="block px-3 py-2 rounded hover:bg-white/10">Página Principal</a>
            </nav>

            <p class="mt-auto text-center text-sm text-white/60">Bem-vindo, {{ auth()->user()->name ?? 'Admin' }}</p>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 p-8 bg-brand-dark overflow-auto">
            <h1 class="text-3xl font-bold text-white mb-6">Painel de Administração</h1>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Total de Jogadores</h2>
                    <p class="text-2xl font-bold">320</p>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Eventos Ativos</h2>
                    <p class="text-2xl font-bold">12</p>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Bountys</h2>
                    <p class="text-2xl font-bold">8</p>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Admins</h2>
                    <p class="text-2xl font-bold">5</p>
                </div>
            </div>

            {{-- Recent Activities / News --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-xl font-semibold mb-4">Últimos Jogadores</h2>
                    <ul class="space-y-2">
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Francisco Yang</li>
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Guilherme Madeira</li>
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Shanon Example</li>
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Maria Silva</li>
                    </ul>
                </div>

                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-xl font-semibold mb-4">Últimas Notícias</h2>
                    <ul class="space-y-2">
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Novo evento lançado!</li>
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Atualização de leaderboard</li>
                        <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">Correção de bugs do sistema</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection
