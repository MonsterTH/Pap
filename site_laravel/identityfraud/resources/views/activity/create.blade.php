@extends('layouts')
@section('title', 'Identity Fraud - Criar Atividade')

@section('content')
<div class="flex min-h-screen bg-brand-dark">
    @include('partials.sidebar')

    <main class="flex-1 p-8 bg-brand-dark overflow-auto">

        <!-- HEADER -->
        <div class="fade-up fade-up-d1 mb-8">
            <h1 class="text-3xl font-bold text-white">Criar Atividade</h1>
            <p class="text-brand-muted mt-1">Define uma nova atividade no sistema.</p>
        </div>

        <!-- ERRORS -->
        @if($errors->any())
            <div class="fade-up fade-up-d1 mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="fade-up fade-up-d1 mb-6 bg-green-500/10 border border-green-500/30 rounded-xl px-5 py-4 text-green-400 text-sm space-y-1">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-8 max-w-2xl mx-auto">
            <form method="POST" action="{{ route('activity.store') }}" class="space-y-6">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Nome</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                           placeholder="Nome da atividade" required>
                </div>

                <!-- TYPE -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Tipo</label>
                    <div class="grid grid-cols-3 gap-3 text-center">
                    <x-radioinput name="type" value="Jogo" label="Jogo" />
                    <x-radioinput name="type" value="Tarefa" label="Tarefa" />
                    <x-radioinput name="type" value="Desafio" label="Desafio" />
                </div>
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Descrição</label>
                    <textarea name="description" rows="4"
                              class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                              placeholder="Descrição da atividade...">{{ old('description') }}</textarea>
                </div>

                <!-- START DATE -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Data de Início</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}"
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>

                <!-- WINNER -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Jogador</label>
                    <x-custom-dropdown
                        name="winner_id"
                        label="Selecionar jogador"
                        :options="$playerOptions"
                        :selected="old('winner_id')"
                    />
                </div>

                <!-- BUTTONS -->
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold text-sm rounded-lg transition btn-pulse">
                        Criar Atividade
                    </button>
                </div>

            </form>
        </div>

    </main>
</div>
@endsection
