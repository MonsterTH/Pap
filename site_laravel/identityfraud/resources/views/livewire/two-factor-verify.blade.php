@section('title', 'Identity Fraud - Registar')
    <div class="min-h-screen flex items-center justify-center bg-brand-dark px-4">

        <div class="w-full max-w-md bg-brand-card border border-white/10 rounded-2xl p-8">

            <h1 class="text-2xl font-bold text-white text-center">
                Verificação de Segurança
            </h1>

            <p class="text-sm text-brand-muted text-center mt-2">
                Introduz o código enviado por email
            </p>

            @if ($errors->any())
                <div class="mt-4 text-red-400 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form wire:submit.prevent="verify" class="mt-6 space-y-4">

                <input
                    type="text"
                    wire:model="code"
                    maxlength="6"
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-center text-white"
                    placeholder="000000"
                >

                <button class="w-full bg-red-600 text-white py-3 rounded-lg">
                    Verificar
                </button>

            </form>

        </div>

    </div>
</section>
