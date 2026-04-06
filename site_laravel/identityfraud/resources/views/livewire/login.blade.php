@section('title', 'Identity Fraud - Login')
<section class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-brand-light text-center">Login</h2>

    @if ($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/30 rounded-lg text-red-400 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="authenticate">
        @csrf
        <div class="mb-4">
            <input wire:model="email" type="email" placeholder="Email" required class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent">
        </div>

        <div class="mb-4">
            <input wire:model="password" type="password" placeholder="Senha" required class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4 flex items-center gap-2">
            <input wire:model="remember" type="checkbox" id="remember" class="rounded border-gray-300">
            <label for="remember" class="text-brand-light text-sm">Lembrar-me</label>
        </div>

        <button type="submit" class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition">
            <span wire:loading.remove wire:target="authenticate">Login</span>
            <span wire:loading wire:target="authenticate">Entrando...</span>
        </button>
    </form>

    <div class="mt-4 text-center text-brand-light text-sm">
        Não tem uma conta?
        <a href="{{ route('register') }}" class="text-brand-accent font-semibold hover:text-brand-glow transition">Registre-se</a>
    </div>
</section>
