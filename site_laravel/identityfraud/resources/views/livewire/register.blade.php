@section('title', 'Identity Fraud - Registar')
<section class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg">

    <h2 class="text-2xl font-bold mb-4 text-brand-light text-center">Criar uma nova conta</h2>

    @if ($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="register">

        <div class="mb-4">
            <input
                wire:model.defer="name"
                type="text"
                placeholder="Nome completo"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <input
                wire:model.defer="email"
                type="email"
                placeholder="Email"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <input
                wire:model.defer="password"
                type="password"
                placeholder="Password"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <input
                wire:model.defer="password_confirmation"
                type="password"
                placeholder="Confirmar password"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
        </div>

        <div class="mb-6">
            <label class="block text-brand-light mb-2 text-sm">Foto de perfil</label>

            <div class="flex items-center justify-center w-full">
                <label class="w-full flex flex-col items-center justify-center px-4 py-6 rounded-lg cursor-pointer transition
                    {{ $image ? '' : 'bg-brand-dark border border-brand-muted border-dashed hover:border-brand-accent' }}">

                    @if ($image)
                        <img
                            src="{{ $image->temporaryUrl() }}"
                            class="w-32 h-32 rounded-full object-cover border border-brand-muted"
                        >
                    @else
                        <span class="text-brand-light text-sm">
                            Clique para enviar uma imagem
                        </span>
                    @endif

                    <input
                        type="file"
                        wire:model="image"
                        class="hidden"
                    >
                </label>
            </div>

            @error('image')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition mb-3"
        >
            <span wire:loading.remove wire:target="register">Registrar</span>
            <span wire:loading wire:target="register">Criando conta...</span>
        </button>

        <a
            href="{{ url('/auth/google') }}"
            class="w-full sm:w-auto mx-auto mb-4 flex items-center justify-center gap-3
                bg-brand-accent hover:bg-brand-glow text-white font-medium
                py-2 px-4 rounded-lg
                transition duration-200"
        >
            <!-- Google Logo -->
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 30 30" fill="white">
                <path d="M 15.003906 3 C 8.3749062 3 3 8.373 3 15 C 3 21.627 8.3749062 27 15.003906 27 C 25.013906 27 27.269078 17.707 26.330078 13 L 25 13 L 22.732422 13 L 15 13 L 15 17 L 22.738281 17 C 21.848702 20.448251 18.725955 23 15 23 C 10.582 23 7 19.418 7 15 C 7 10.582 10.582 7 15 7 C 17.009 7 18.839141 7.74575 20.244141 8.96875 L 23.085938 6.1289062 C 20.951937 4.1849063 18.116906 3 15.003906 3 z"></path>
            </svg>

            <span>Continuar com Google</span>
        </a>

    </form>

    <p class="mt-4 text-center text-brand-light text-sm">
        Já possui uma conta?
        <a href="{{ route('login') }}" class="text-brand-accent font-semibold hover:text-brand-glow transition">
            Faça login
        </a>
    </p>
</section>
