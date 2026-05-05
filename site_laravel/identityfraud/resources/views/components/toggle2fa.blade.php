<div>
<label class="relative inline-flex items-center cursor-pointer">
    <input type="checkbox"
        wire:click="toggle2FA"
        class="sr-only peer"
        {{ auth()->user()->has_2fa ? 'checked' : '' }}>

    <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:bg-brand-accent transition-all"></div>

    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-all peer-checked:translate-x-5"></div>
</label>

{{-- 👇 AQUI aparece o QR quando ativas --}}
@if(session('qr_secret'))
    <div class="mt-4 bg-white/5 p-4 rounded-lg">

        <p class="text-white mb-2">
            Escaneia no Google Authenticator
        </p>

        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ app(\PragmaRX\Google2FA\Google2FA::class)->getQRCodeUrl(
            config('app.name'),
            auth()->user()->email,
            session('qr_secret')
        ) }}">

    </div>
@endif
</div>
