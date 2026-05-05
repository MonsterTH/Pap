@extends('layouts')

@section('title', 'Editar Perfil')

@section('content')

<section class="max-w-3xl mx-auto px-4 md:px-8 py-12">

    {{-- Mensagens de sucesso/erro --}}
    @if(session('status'))
        <div class="mb-6 px-4 py-3 bg-green-500/10 border border-green-500/30 rounded-lg text-green-400 text-sm text-center fade-up">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 px-4 py-3 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm fade-up">
            <ul class="space-y-1 text-center">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-brand-card border border-white/10 rounded-2xl p-8 shadow-lg fade-up fade-up-d1">

        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-2xl md:text-3xl font-extrabold font-display">
                Editar <span class="text-brand-accent">Perfil</span>
            </h1>
            <p class="text-brand-muted text-sm mt-2">Atualiza as tuas informações pessoais</p>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            {{-- FOTO DE PERFIL --}}
            <div class="flex flex-col items-center gap-4 mb-8">
                <div class="relative group cursor-pointer" onclick="document.getElementById('profileInput').click()">
                    <img
                        id="profilePreview"
                        src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/images/default.png') }}"
                        class="w-24 h-24 rounded-full object-cover border-2 border-white/10 group-hover:border-brand-accent transition-all duration-300"
                    >
                    <div class="absolute inset-0 rounded-full bg-black/50 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h3l2-3h3a2 2 0 0 1 2 2z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                    </div>
                </div>

                <input type="file" name="profile_picture" id="profileInput" class="hidden" accept="image/*">
                <input type="hidden" name="remove_picture" id="removePicture" value="0">

                <div class="flex items-center gap-3">
                    <p class="text-brand-muted text-xs">Clica na imagem para alterar</p>
                </div>
            </div>

            {{-- DIVIDER --}}
            <div class="border-t border-white/5 my-6"></div>

            {{-- INFORMAÇÕES PESSOAIS --}}
            <div class="grid grid-cols-1 gap-6">

                <div class="space-y-1">
                    <label class="text-sm font-medium text-brand-muted">Nome</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        placeholder="O teu nome"
                        class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent transition @error('name') border-red-500 @enderror"
                    >
                    @error('name')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="space-y-1">
                    <label class="text-sm font-medium text-brand-muted">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        placeholder="email@exemplo.com"
                        class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white placeholder-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent transition @error('email') border-red-500 @enderror"
                    >
                    @error('email')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

            </div>

            {{-- DIVIDER --}}
            <div class="border-t border-white/5 my-6"></div>

            {{-- PASSWORDS --}}
            <div class="space-y-1">
                <label class="text-sm font-medium text-brand-muted">Password Atual</label>
                <input
                    type="password"
                    name="current_password"
                    placeholder="••••••••"
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white"
                >
                @error('current_password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <p class="text-sm font-medium text-brand-muted mb-4">
                    Alterar Password
                    <span class="text-xs text-brand-muted/50">(opcional)</span>
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-sm font-medium text-brand-muted">Nova Password</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white"
                        >
                    </div>

                    <div class="space-y-1">
                        <label class="text-sm font-medium text-brand-muted">Confirmar Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="••••••••"
                            class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white"
                        >
                    </div>
                </div>
            </div>

            {{-- BOTÕES --}}
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('profile.index') }}" class="text-sm text-brand-muted hover:text-brand-light transition">
                    ← Cancelar
                </a>
                <button
                    type="submit"
                    class="px-8 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold uppercase text-sm rounded-lg transition btn-pulse"
                >
                    Guardar Alterações
                </button>
            </div>
        </form>
    </div>
    <a href="{{ route('2fa.setup') }}">
    <div class="fade-up fade-up-d2 w-full text-center h-10 mt-4 px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold rounded-lg transition btn-pulse">
    <p>Ativar Verificaçao de 2 Fatores</p>
    </div>
    </a>
</section>

<script>
    document.getElementById('profileInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
                document.getElementById('removePicture').value = '0';
            };
            reader.readAsDataURL(file);

            // Mostra o botão de remover após upload
            const btn = document.getElementById('removeBtn');
            if (btn) btn.classList.remove('hidden');
        }
    });

    function removePicture() {
        document.getElementById('profilePreview').src = '{{ asset('storage/images/default.png') }}';
        document.getElementById('removePicture').value = '1';
        document.getElementById('profileInput').value = '';

        const btn = document.getElementById('removeBtn');
        if (btn) btn.classList.add('hidden');
    }
</script>

@endsection
