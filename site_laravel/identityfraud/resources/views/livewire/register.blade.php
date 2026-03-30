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

        <button
            type="submit"
            class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition"
        >
            <span wire:loading.remove wire:target="register">Registrar</span>
            <span wire:loading wire:target="register">Criando conta...</span>
        </button>
    </form>

    <p class="mt-4 text-center text-brand-light text-sm">
        Já possui uma conta?
        <a href="{{ route('login') }}" class="text-brand-accent font-semibold hover:text-brand-glow transition">
            Faça login
        </a>
    </p>
</section>
