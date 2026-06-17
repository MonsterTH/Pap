@extends('layouts')

@section('title', 'Câmaras')

@section('content')
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">

    <!-- Header -->

    <div class="grid lg:grid-cols-[280px_1fr] gap-8">

        <!-- Sidebar -->
        <aside class="bg-brand-card border border-white/5 rounded-2xl p-5">

            <div class="mb-5">
                <span class="text-xs uppercase tracking-[0.2em] text-brand-accent">
                    Câmaras
                </span>
            </div>

            <div class="space-y-3">
                @foreach($cameras as $id => $camera)
                    <a href="{{ route('watch', $id) }}"
                    class="block w-full text-left p-4 rounded-xl transition
                    {{ request()->route('watch') == $id
                            ? 'border border-brand-accent/30 bg-brand-accent/10'
                            : 'border border-white/10 hover:border-brand-gold/40 hover:bg-white/[0.02]' }}">

                        <div class="font-display text-xl text-brand-gold">
                            {{ $camera['name'] }}
                        </div>

                        <div class="text-xs text-brand-muted">
                            {{ $camera['location'] }}
                        </div>
                    </a>
                @endforeach
            </div>

            <a href="{{ route('home') }}"
               class="mt-8 w-full inline-flex justify-center items-center gap-2 px-5 py-3 bg-brand-accent text-white rounded-xl font-display font-bold uppercase tracking-wider hover:bg-brand-glow transition">

                Voltar

                <svg xmlns="http://www.w3.org/2000/svg"
                     width="16"
                     height="16"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </a>

        </aside>

        <!-- Video Area -->
        <div>

            <div class="relative">

                <!-- Glow -->
                <div class="absolute -inset-3 bg-gradient-to-r from-brand-accent via-brand-accent/30 to-brand-gold rounded-3xl blur-xl opacity-40"></div>

                <!-- Frame -->
                <div class="relative p-[3px] rounded-3xl bg-gradient-to-r from-brand-accent via-[#ff6b35] to-brand-gold">

                    <div class="bg-[#050816] rounded-[22px] overflow-hidden">

                        <div class="aspect-video flex items-center justify-center">

                            <!-- STREAM / VIDEO -->
                            <video
                                class="w-full h-full object-cover"
                                autoplay
                                muted
                                loop
                                playsinline
                                disablepictureinpicture
                                controlslist="nodownload noplaybackrate nofullscreen"
                                oncontextmenu="return false;">
                                <source src="{{ $selectedCamera['video'] }}" type="video/mp4">
                            </video>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Camera Info -->
            <div class="mt-5 flex items-center justify-between">

                <div>
                    <h2 class="font-display text-2xl font-bold">
                        {{ $selectedCamera['name'] }}
                    </h2>

                    <p class="text-brand-muted">
                        {{ $selectedCamera['location'] }}
                    </p>
                </div>

                <span class="px-4 py-2 rounded-full bg-green-500/10 border border-green-500/30 text-green-400 text-xs uppercase tracking-wider">
                    Ao Vivo
                </span>

            </div>

        </div>

    </div>

</section>
@endsection
