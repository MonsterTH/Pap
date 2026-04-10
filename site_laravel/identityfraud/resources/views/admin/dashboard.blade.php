@extends('layouts')
@section('title', 'Identity Fraud - Dashboard')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')
        {{-- Main content --}}
        <main class="fade-up fade-up-d1 flex-1 p-8 bg-brand-dark overflow-auto">
            <h1 class="text-3xl font-bold text-white mb-6">Painel de Administração</h1>

            {{-- Stats Cards --}}
            <div class="fade-up fade-up-d2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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
            <div class="fade-up fade-up-d3 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-xl font-semibold mb-4">Paticipantes Adicionados</h2>
                    <ul class="space-y-2">
                        @forelse($latestPlayers as $player)
                            <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">
                                {{ $player->name }}
                            </li>
                        @empty
                            <li class="text-sm text-brand-muted">Sem jogadores.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-xl font-semibold mb-4">Últimas Notícias</h2>
                    <ul class="space-y-2">
                        @forelse($latestNews as $news)
                            <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">
                                {{ $news->title }}
                            </li>
                        @empty
                            <li class="text-sm text-brand-muted">Sem notícias.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                    <h2 class="text-xl font-semibold mb-4">Participantes em votaçao</h2>
                    <ul class="space-y-2">
                        @forelse($latestEviction as $eviction)
                            <li class="px-3 py-2 bg-white/5 rounded hover:bg-white/10">
                                {{ $eviction->player->name }}
                            </li>
                        @empty
                            <li class="text-sm text-brand-muted">Sem notícias.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="bg-brand-card p-6 rounded-lg card-hover">
                @foreach($latestSeason as $Season)

                @if($Season->winner_id)
                            <h2 class="text-xl font-semibold mb-4">Temporada Passada</h2>
                        @else
                            <h2 class="text-xl font-semibold mb-4">Temporada Atual</h2>
                        @endif

                <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-6 hover:scale-[1.02] transition">
                <!-- HEADER -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-white">
                        {{ $Season->name }}
                    </h2>

                     @if($Season->winner_id)
                            <span class="text-xs px-3 py-1 rounded-full bg-green-500/10 text-green-400 border border-green-500/30">
                                Finalizada
                            </span>
                        @else
                            <span class="text-xs px-3 py-1 rounded-full bg-yellow-500/10 text-yellow-400 border border-yellow-500/30">
                                Em curso
                            </span>
                        @endif
                </div>

                <!-- INFO -->
                <div class="text-sm text-brand-muted space-y-2">

                    <p>
                        Data:
                        <span class="text-white">
                            {{ $Season->year }}
                        </span>
                    </p>

                    <p>
                        Vencedor:
                        <span class="text-white">
                             {{ $Season->winner ? $Season->winner->name : 'Ainda não definido' }}
                        </span>
                    </p>

                </div>

                <!-- FOOTER -->
                <div class="mt-5 flex justify-between items-center">
                    <span class="text-xs text-brand-muted">
                        ID:{{ $Season->id }}
                    </span>
                </div>

            </div>
            @endforeach

                </div>
            </div>
        </main>
    </div>
@endsection
