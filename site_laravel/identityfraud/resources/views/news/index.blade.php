@extends('layouts')
@section('title', 'Identity Fraud - News')

@section('content')

<!-- TRENDING -->
<section class="fade-up fade-up-d1 max-w-7xl mx-auto px-4 md:px-8 py-12">

    <h1 class="mb-5 text-2xl md:text-3xl font-bold">
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">
            Trending
        </span>
    </h1>

    <div class="relative overflow-hidden rounded-3xl">

        <!-- Slides -->
        <div id="trendingSlider" class="flex transition-transform duration-700 ease-in-out">

            @foreach ($trending as $index => $new)
                <a href="{{ route('news.show', $new->id) }}"
                   class="group min-w-full relative">

                    <div class="relative h-[300px] w-full overflow-hidden rounded-3xl">

                        <!-- Image -->
                        <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('news/Image.png') }}"
                            class="w-full h-full object-cover
                                    group-hover:scale-105 transition duration-700"
                            alt="{{ $new->title }}">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t
                                    from-black/80 via-black/20 to-transparent
                                    group-hover:from-black/90 transition duration-500">
                        </div>

                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 p-8 md:p-12 max-w-3xl">

                            <h2 class="mt-2 text-3xl md:text-5xl font-bold text-white leading-tight
                                       group-hover:text-red-300 transition">
                                {{ $new->title }}
                            </h2>

                            @if ($new->tags->isNotEmpty())
                                <div class="flex flex-wrap gap-2 mt-4">
                                    @foreach ($new->tags as $tag)
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                                                    bg-red-500/10 border border-red-500/40 text-red-400
                                                    backdrop-blur-sm">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                </a>
            @endforeach

        </div>

        <!-- Dots -->
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-3 z-20">
            @foreach ($trending as $index => $new)
                <button
                    class="slider-dot w-3 h-1.5 rounded-full bg-white/40 hover:bg-white transition"
                    data-slide="{{ $index }}">
                </button>
            @endforeach
        </div>

    </div>
</section>


<!-- NOVIDADES -->
<section class="fade-up fade-up-d2 max-w-7xl mx-auto px-4 md:px-8 py-14">

    <div class="flex items-center justify-between mb-7">
        <h1 class="text-2xl md:text-3xl font-bold text-brand-accent">
            Novidades
        </h1>

        <div class="h-[1px] flex-1 ml-6 bg-gradient-to-r from-red-500/40 to-transparent"></div>
    </div>

    <div class="flex gap-6 overflow-x-auto pb-4 no-scrollbar">

        @foreach ($novidades as $new)

            <a href="{{ route('news.show', $new->id) }}"
               class="group min-w-[340px] md:min-w-[380px]">

                <article class="relative h-[200px] overflow-hidden rounded-3xl border border-white/10 bg-brand-card">

                    <!-- IMAGE -->
                    <img src="{{ $new->image ? asset('storage/news/' . $new->image) : asset('news/Image.png') }}"
                         class="absolute inset-0 w-full h-full object-cover
                                group-hover:scale-110 transition duration-700"
                                alt="{{ $new->title }}">

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-gradient-to-t
                                from-black via-black/40 to-black/10">
                    </div>

                    <!-- CONTENT -->
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">

                        <!-- TAGS -->
                        @if ($new->tags->isNotEmpty())
                            <div class="flex flex-wrap gap-2 mb-4">

                                @foreach ($new->tags as $tag)
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                                    bg-red-500/10 border border-red-500/40 text-red-400
                                                    backdrop-blur-sm">

                                        {{ $tag->name }}

                                    </span>
                                @endforeach

                            </div>
                        @endif

                        <!-- TITLE -->
                        <h2 class="text-2xl font-bold text-white leading-tight
                                   group-hover:text-red-300 transition">

                            {{ $new->title }}

                        </h2>

                    </div>

                </article>

            </a>

        @endforeach

    </div>

</section>

<!-- DRAMA -->
<section class="fade-up fade-up-d3 max-w-7xl mx-auto px-4 md:px-8 py-12">

    <div class="flex items-center justify-between mb-7">
        <h1 class="text-2xl md:text-3xl font-bold text-brand-accent">
            Drama
        </h1>

        <div class="h-[1px] flex-1 ml-6 bg-gradient-to-r from-red-500/40 to-transparent"></div>
    </div>

    <div class="flex gap-4 overflow-x-auto pb-2">
        @foreach ($drama as $new)
            <a href="{{ route('news.show', $new->id) }}"
               class="group min-w-[340px] md:min-w-[380px]">

                <article class="relative h-[200px] overflow-hidden rounded-3xl border border-white/10 bg-brand-card">

                    <!-- IMAGE -->
                    <img src="{{ $new->image ? asset('storage/news/' . $new->image) : asset('news/Image.png') }}"
                         class="absolute inset-0 w-full h-full object-cover
                                group-hover:scale-110 transition duration-700"
                                alt="{{ $new->title }}">

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-gradient-to-t
                                from-black via-black/40 to-black/10">
                    </div>

                    <!-- CONTENT -->
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">

                        <!-- TAGS -->
                        @if ($new->tags->isNotEmpty())
                            <div class="flex flex-wrap gap-2 mb-4">

                                @foreach ($new->tags as $tag)
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                                                    bg-red-500/10 border border-red-500/40 text-red-400
                                                    backdrop-blur-sm">

                                        {{ $tag->name }}

                                    </span>
                                @endforeach

                            </div>
                        @endif

                        <!-- TITLE -->
                        <h2 class="text-2xl font-bold text-white leading-tight
                                   group-hover:text-red-300 transition">

                            {{ $new->title }}

                        </h2>

                    </div>

                </article>

            </a>
        @endforeach
    </div>
</section>

@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {

    const slider = document.getElementById('trendingSlider');
    const dots = document.querySelectorAll('.slider-dot');

    if (!slider || dots.length === 0) return;

    let currentSlide = 0;
    const totalSlides = dots.length;

    function updateSlider() {
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;

        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-white/40');
                dot.classList.add('bg-white');
            } else {
                dot.classList.remove('bg-white');
                dot.classList.add('bg-white/40');
            }
        });
    }

    // Dot navigation
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            currentSlide = Number(dot.dataset.slide);
            updateSlider();
        });
    });

    // Auto-slide
    setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }, 5000);

    updateSlider();

});
</script>
