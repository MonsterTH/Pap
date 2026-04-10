@extends('layouts')

@section('title', '2FA Verification')

@section('content')

<section class="max-w-2xl mx-auto px-4 md:px-8 py-12">

    {{-- MESSAGES --}}
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

    {{-- CARD --}}
    <div class="bg-brand-card border border-white/10 rounded-2xl p-8 shadow-lg fade-up fade-up-d1">

        {{-- HEADER --}}
        <div class="text-center mb-8">
            <h1 class="text-2xl md:text-3xl font-extrabold text-white">
                2FA <span class="text-brand-accent">Verification</span>
            </h1>
            <p class="text-brand-muted text-sm mt-2">
                Insere o código da tua aplicação autenticadora
            </p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="/2fa/verify" class="space-y-5">
            @csrf

            <div class="flex justify-center gap-2">
                @for($i = 0; $i < 6; $i++)
                    <input
                        type="text"
                        name="code[]"
                        maxlength="1"
                        inputmode="numeric"
                        class="w-12 h-12 text-center text-white text-lg font-bold bg-white/5 border border-white/10 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-accent"
                        oninput="moveNext(this, {{ $i }})"
                    >
                @endfor
            </div>
            {{-- hidden final value --}}
                <input type="hidden" name="code" id="code">

            <button
                type="submit"
                class="w-full px-6 py-2.5 bg-brand-accent hover:bg-brand-glow text-white font-bold rounded-lg transition btn-pulse"
            >
                Verificar
            </button>
        </form>
    </div>

</section>
<script>
function moveNext(el, index) {
    const inputs = document.querySelectorAll('input[name="code[]"]');

    if (el.value.length === 1 && index < inputs.length - 1) {
        inputs[index + 1].focus();
    }

    let code = '';
    inputs.forEach(input => code += input.value);
    document.getElementById('code').value = code;
}

// backspace go back
document.querySelectorAll('input[name="code[]"]').forEach((input, index, arr) => {
    input.addEventListener('keydown', function(e) {
        if (e.key === "Backspace" && !this.value && index > 0) {
            arr[index - 1].focus();
        }
    });
});
</script>
@endsection
