<a href="{{ $href }}" wire:navigate
   class="relative px-3 py-2 font-semibold tracking-wide transition-colors
          {{ $isActive() ? 'text-brand-accent after:w-full' : 'text-brand-light hover:text-brand-accent after:w-0' }}
          after:absolute after:bottom-0 after:left-0 after:h-[2px] after:bg-brand-accent after:transition-all after:duration-300 after:rounded-full hover:after:w-full">
    {{ $slot }}
</a>
