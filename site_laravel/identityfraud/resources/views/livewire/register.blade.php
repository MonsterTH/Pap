<section class="max-w-md mx-auto mt-10 p-6 bg-brand-card rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-brand-light text-center">Create a new account</h2>

    <form wire:submit="register">
        <div class="mb-4">
            <input
                wire:model="name"
                id="name"
                type="text"
                autocomplete="name"
                placeholder="Full name"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <input
                wire:model="email"
                id="email"
                type="email"
                autocomplete="email"
                placeholder="Email"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <input
                wire:model="password"
                id="password"
                type="password"
                autocomplete="new-password"
                placeholder="Password"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <input
                wire:model="password_confirmation"
                id="password_confirmation"
                type="password"
                autocomplete="new-password"
                placeholder="Confirm password"
                class="w-full px-3 py-2 rounded bg-brand-dark border border-brand-muted text-brand-light focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-brand-accent"
            >
        </div>

        <button
            type="submit"
            class="w-full bg-brand-accent hover:bg-brand-glow text-white font-bold py-2 px-4 rounded transition"
        >
            <span wire:loading.remove wire:target="register">Register</span>
            <span wire:loading wire:target="register">Creating account...</span>
        </button>
    </form>

    <p class="mt-4 text-center text-brand-light text-sm">
        Already have an account?
        <a href="{{ route('login') }}" class="text-brand-accent font-semibold hover:text-brand-glow transition" wire:navigate>
            Sign in
        </a>
    </p>
</section>
