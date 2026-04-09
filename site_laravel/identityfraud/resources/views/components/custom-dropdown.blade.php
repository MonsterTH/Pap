<div>
    @props([
        'label' => 'Escolhe uma opção...',
        'options' => [],
        'name',
        'selected' => null,
        'wire' => null
    ])

    <div class="relative" x-data="{
            open: false,
            selected: @js($selected),
            options: @js($options),
            wireProperty: @js($wire)
        }">

        <select name="{{ $name }}" class="hidden" x-ref="select">
            <option value="" disabled selected>{{ $label }}</option>
            @foreach($options as $option)
                <option value="{{ $option['value'] }}" @selected($option['value'] == $selected)>
                    {{ $option['label'] }}
                </option>
            @endforeach
        </select>

        <button type="button"
                @click="open = !open"
                class="w-full flex items-center justify-between bg-white/5 border border-white/10 hover:border-white/20 rounded-lg px-4 py-2.5 text-sm text-white/40 focus:outline-none focus:ring-2 focus:ring-brand-accent transition">
            <span x-text="selected ? options.find(o => o.value == selected)?.label : '{{ $label }}'"
                  :class="selected ? 'text-white' : 'text-white/40'"></span>
            <svg class="w-4 h-4 text-brand-muted transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div x-show="open" @click.outside="open = false"
             class="absolute z-50 w-full mt-2 bg-brand-card border border-white/10 rounded-xl shadow-2xl overflow-hidden max-h-60 overflow-y-auto"
             x-cloak>
            <template x-for="option in options" :key="option.value">
                <div class="flex items-center gap-3 px-4 py-3 hover:bg-white/10 cursor-pointer transition"
                     @click="
                        selected = option.value;
                        $nextTick(() => { $refs.select.value = option.value; });
                        if (wireProperty) $wire.set(wireProperty, option.value);
                        open = false;
                     ">
                    <template x-if="option.image">
                        <img :src="option.image" class="w-8 h-8 rounded-full object-cover border border-white/10">
                    </template>
                    <span class="text-sm text-white" x-text="option.label"></span>
                </div>
            </template>
        </div>
    </div>
</div>
