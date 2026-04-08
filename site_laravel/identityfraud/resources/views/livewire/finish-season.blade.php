<div> <!-- ELEMENTO RAIZ OBRIGATÓRIO -->
    @if($showModal && $season)
        <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 fade-up">
            <div class="bg-brand-card p-6 rounded-xl w-full max-w-md">

                <h2 class="text-lg font-bold text-white mb-4">
                    Finalizar {{ $season->name }}
                </h2>

                <x-custom-dropdown
                    name="winner_id"
                    label="Escolher jogador"
                    :options="$players->map(fn($p) => [
                        'value' => $p->id,
                        'label' => $p->name,
                        'image' => $p->profile_picture
                            ? asset('storage/' . $p->profile_picture)
                            : asset('storage/images/default.png'),
                    ])->toArray()"
                    :selected="$winner_id"
                />

                @error('winner_id')
                    <p class="text-red-400 text-sm mb-2">{{ $message }}</p>
                @enderror

                <div class="flex justify-end gap-2 mt-5">
                    <button wire:click="$set('showModal', false)"
                            class="text-sm text-brand-muted">
                        Cancelar
                    </button>

                    <button wire:click="finish"
                            wire:loading.attr="disabled"
                            class="bg-brand-accent px-4 py-2 rounded text-white btn-pulse flex items-center gap-2">
                        <span wire:loading.remove>Confirmar</span>
                        <span wire:loading class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="white" stroke-width="4" fill="none"/>
                            </svg>
                            A guardar...
                        </span>
                    </button>
                </div>

            </div>
        </div>

        <div class="fixed inset-0" wire:click="$set('showModal', false)"></div>
    @endif

</div>
