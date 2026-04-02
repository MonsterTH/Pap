@extends('layouts')
@section('title', 'Identity Fraud - Dashboard')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')
        {{-- Main content --}}
        <main class="flex-1 p-8 bg-brand-dark overflow-auto">
            <h1 class="text-3xl font-bold text-white mb-6">Painel de Administração</h1>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Total de Jogadores</h2>
                    <p class="text-2xl font-bold">{{ $playersCount }}</p>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Atividades a acontecer</h2>
                    <p class="text-2xl font-bold">{{ $activityCount }}</p>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Bountys</h2>
                    <p class="text-2xl font-bold">{{ $bountiesCount }}</p>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-sm text-white/60 mb-2">Admins</h2>
                    <p class="text-2xl font-bold">{{ $adminsCount }}</p>
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
