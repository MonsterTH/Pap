@extends('layouts')
    @section('title', 'Identity Fraud')
    @section('content')
        <!-- ═══════ HERO SECTION ═══════ -->
        <section class="relative max-w-7xl mx-auto px-4 md:px-8 py-16 md:py-24">
                <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16">
                    <div class="flex-1 fade-up">
                            <span class="inline-block px-3 py-1 mb-4 text-xs font-display font-bold tracking-[0.2em] uppercase text-brand-accent bg-brand-accent/10 border border-brand-accent/20 rounded-full">Nova Temporada</span>
                            <h1 class="font-display text-4xl md:text-6xl lg:text-7xl font-extrabold leading-[1.05] tracking-tight glitch-text">
                                O que é o<br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-gold">Identity Fraud</span>?
                            </h1>
                            <p class="mt-6 text-base md:text-lg text-brand-muted leading-relaxed max-w-xl font-body">
                                Identity Fraud torna todos os competidores em investigadores. <strong class="text-brand-light">16 Pessoas</strong>, todas com identidades falsas, competem para descobrir a identidade dos outros enquanto protegem a sua.
                            </p>
                            <p class="mt-3 text-base md:text-lg text-brand-muted leading-relaxed max-w-xl font-body">
                                Ajuda o teu investigador favorito a vencer ao votar na competição enquanto te juntas à investigação.
                            </p>
                            <div class="mt-8">
                                <a href="{{ route('about') }}" class="btn-pulse inline-flex items-center gap-2 px-8 py-4 bg-brand-accent text-white font-display font-bold text-sm tracking-wider uppercase rounded-lg hover:bg-brand-glow transition-colors shadow-[0_4px_30px_rgba(230,57,70,0.4)]">
                                        Descobrir Mais
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                </a>
                            </div>
                    </div>
                    <div class="flex-1 fade-up fade-up-d2">
                            <div class="relative">
                                <div class="absolute -inset-4 bg-gradient-to-tr from-brand-accent/20 via-transparent to-brand-gold/10 rounded-2xl blur-2xl"></div>
                                <img class="relative w-full max-w-lg mx-auto rounded-2xl shadow-2xl shadow-brand-accent/10 border border-white/5 object-cover" src="imgs/ns2.jpg" alt="Identity Fraud">
                            </div>
                    </div>
                </div>
        </section>

        <!-- ═══════ COMPETIDORES ═══════ -->
        <section class="max-w-7xl mx-auto px-4 md:px-8 py-16">
                <div class="grid md:grid-cols-2 gap-10 md:gap-14">

                    <!-- Competidores Card -->
                    <div class="card-hover bg-brand-card rounded-2xl border border-white/5 p-8 fade-up fade-up-d1">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-1.5 h-8 bg-brand-accent rounded-full"></div>
                                <h2 class="font-display text-2xl md:text-3xl font-bold tracking-tight">Competidores</h2>
                            </div>
                            <p class="text-brand-muted mb-6 font-body">Conhece os competidores da nova temporada de Identity Fraud!</p>
                            <div id="carroselComp">
                                <ul class="carousel-track">
                                        <li data-accName="Item 1"><img src="imgs/ns.jpg" alt="Competidor 1"></li>
                                        <li data-accName="Item 2"><img src="imgs/ns2.jpg" alt="Competidor 2"></li>
                                        <li data-accName="Item 3"><img src="imgs/ns3.jpg" alt="Competidor 3"></li>
                                        <li data-accName="Item 4"><img src="imgs/ns4.jpg" alt="Competidor 4"></li>
                                </ul>
                                <!-- Carousel indicators -->
                                <div class="flex justify-center gap-2 mt-4" id="indicatorsComp"></div>
                            </div>
                    </div>

                    <!-- Notícias Card -->
                    <div class="card-hover bg-brand-card rounded-2xl border border-white/5 p-8 fade-up fade-up-d2">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-1.5 h-8 bg-brand-gold rounded-full"></div>
                                <h2 class="font-display text-2xl md:text-3xl font-bold tracking-tight">Notícias</h2>
                            </div>
                            <p class="text-brand-muted mb-6 font-body">Mantém-te informado no que acontece em Identity Fraud</p>
                            <div id="carroselNew">
                                <ul class="carousel-track">
                                        <li data-accName="Item 1"><img src="imgs/ns.jpg" alt="Notícia 1"></li>
                                        <li data-accName="Item 2"><img src="imgs/ns2.jpg" alt="Notícia 2"></li>
                                        <li data-accName="Item 3"><img src="imgs/ns3.jpg" alt="Notícia 3"></li>
                                        <li data-accName="Item 4"><img src="imgs/ns4.jpg" alt="Notícia 4"></li>
                                </ul>
                                <div class="flex justify-center gap-2 mt-4" id="indicatorsNew"></div>
                            </div>
                    </div>

                </div>
        </section>

        <script>
                function autoCarousel(selector, speed) {
                    const track = document.querySelector(selector + " ul");
                    const slides = track.children;
                    const indicatorContainer = document.querySelector(selector.replace("#carrosel", "#indicators"));
                    let index = 0;

                    // Build indicators
                    if (indicatorContainer) {
                            for (let i = 0; i < slides.length; i++) {
                                const dot = document.createElement("button");
                                dot.className = "w-2 h-2 rounded-full transition-all duration-300 " + (i === 0 ? "bg-red-500 w-6" : "bg-white/20");
                                dot.addEventListener("click", () => {
                                        index = i;
                                        scrollTo();
                                        updateDots();
                                });
                                indicatorContainer.appendChild(dot);
                            }
                    }

                    function updateDots() {
                            if (!indicatorContainer) return;
                            const dots = indicatorContainer.children;
                            for (let i = 0; i < dots.length; i++) {
                                dots[i].className = "w-2 h-2 rounded-full transition-all duration-300 " +
                                        (i === index ? "bg-red-500 w-6" : "bg-white/20 hover:bg-white/40");
                            }
                    }

                    function scrollTo() {
                            track.scrollTo({
                                left: slides[index].offsetLeft - track.offsetLeft,
                                behavior: "smooth"
                            });
                    }

                    setInterval(() => {
                            index = (index + 1) % slides.length;
                            scrollTo();
                            updateDots();
                    }, speed);
                }

                autoCarousel("#carroselComp", 5000);
                autoCarousel("#carroselNew", 5000);
        </script>
    @endsection
