@props([
    'name',
    'value',
    'label',
    'checked' => false
])

<label class="cursor-pointer block">
    <input
        type="radio"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        class="peer hidden"
    >

    <span class="block border border-white/10 rounded-lg py-2 px-4 transition
                 hover:bg-white/10
                 peer-checked:bg-brand-accent
                 peer-checked:text-white">
        {{ $label }}
    </span>
</label>
