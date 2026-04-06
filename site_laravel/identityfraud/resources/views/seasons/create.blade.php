@extends('layouts')
@section('title', 'Identity Fraud - Criar Season')

@section('content')
<div class="flex min-h-screen bg-brand-dark">
    @include('partials.sidebar')

    <main class="flex-1 p-8 bg-brand-dark overflow-auto">

        <!-- HEADER -->
        <div class="fade-up fade-up-d1 mb-8">
            <h1 class="text-3xl font-bold text-white">Criar Season</h1>
            <p class="text-brand-muted mt-1">Adiciona uma nova temporada ao reality show.</p>
        </div>

        <!-- ERRORS -->
        @if($errors->any())
            <div class="fade-up fade-up-d1 mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- FORM -->
        <div class="fade-up fade-up-d2 bg-brand-card border border-white/10 rounded-2xl p-8 max-w-2xl mx-auto">
            <form method="POST" action="{{ route('season.store') }}" class="space-y-6">
                @csrf

                <!-- NAME -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Nome da Season</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                           placeholder="Nome da temporada" required>
                </div>

                <!-- YEAR -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Ano</label>
                    <input type="number" name="year" value="{{ old('year') }}"
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2.5 text-sm text-white placeholder:text-white/30 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                           placeholder="Ano" required>
                </div>

                <!-- WINNER -->
                <div>
                    <label class="block text-xs uppercase tracking-widest text-brand-muted mb-2">Vencedor</label>

                    <x-custom-dropdown
                        name="winner_id"
                        label="Selecionar vencedor"
                        :options="$players->map(fn($p) => [
                            'value' => $p->id,
                            'label' => $p->name,
                            'image' => $p->photo ? asset('storage/' . $p->photo) : asset('storage/images/default.png')
                        ])->toArray()"
                        :selected="old('winner_id')"
                    />
                </div>

                <!-- BUTTONS -->
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold text-sm rounded-lg transition btn-pulse">
                        Criar Season
                    </button>
                </div>

            </form>
        </div>

    </main>
</div>
@endsection
