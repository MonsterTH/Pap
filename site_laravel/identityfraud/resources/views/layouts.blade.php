<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
        <script>
            tailwind.config = {
            theme: {
                extend: {
                fontFamily: {
                    display: ['Syne', 'sans-serif'],
                    body: ['DM Sans', 'sans-serif'],
                },
                colors: {
                    brand: {
                    dark: '#0a0a0f',
                    deeper: '#0e0e18',
                    card: '#141422',
                    accent: '#e63946',
                    glow: '#ff4d5a',
                    muted: '#8888aa',
                    light: '#e8e8f0',
                    gold: '#f4c542',
                    }
                }
                }
            }
            }
        </script>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'DM Sans', sans-serif; background: #0a0a0f; color: #e8e8f0; }

            /* Noise texture overlay */
            body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            }

            /* Scrollbar */
            ::-webkit-scrollbar { width: 6px; }
            ::-webkit-scrollbar-track { background: #0a0a0f; }
            ::-webkit-scrollbar-thumb { background: #e63946; border-radius: 3px; }

            /* Carousel */
            .carousel-track {
            display: flex;
            overflow-x: hidden;
            scroll-behavior: smooth;
            gap: 1rem;
            scroll-snap-type: x mandatory;
            }
            .carousel-track li {
            flex: 0 0 100%;
            scroll-snap-align: start;
            list-style: none;
            }
            .carousel-track li img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 12px;
            }

            /* Nav hover effect */
            .nav-link {
            position: relative;
            overflow: hidden;
            }
            .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #e63946;
            transition: width 0.3s ease;
            }
            .nav-link:hover::after {
            width: 100%;
            }

            /* Hero glow */
            .hero-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(230,57,70,0.12) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            pointer-events: none;
            }

            /* Card hover */
            .card-hover {
            transition: transform 0.4s cubic-bezier(.22,.68,0,1.3), box-shadow 0.4s ease;
            }
            .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(230,57,70,0.15);
            }

            /* Fade-in animation */
            @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
            }
            .fade-up {
            animation: fadeUp 0.8s ease forwards;
            }
            .fade-up-d1 { animation-delay: 0.1s; opacity: 0; }
            .fade-up-d2 { animation-delay: 0.25s; opacity: 0; }
            .fade-up-d3 { animation-delay: 0.4s; opacity: 0; }

            /* Glitch title effect */
            @keyframes glitch {
            0%, 100% { text-shadow: 2px 0 #e63946, -2px 0 #3b82f6; }
            25% { text-shadow: -2px -1px #e63946, 2px 1px #3b82f6; }
            50% { text-shadow: 1px 2px #e63946, -1px -2px #3b82f6; }
            75% { text-shadow: -1px 1px #e63946, 1px -1px #3b82f6; }
            }
            .glitch-text:hover {
            animation: glitch 0.3s ease infinite;
            }

            /* Button pulse */
            .btn-pulse {
            position: relative;
            overflow: hidden;
            }
            .btn-pulse::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
            }
            .btn-pulse:hover::before {
            transform: translateX(100%);
            }

            /* Diagonal cut */
            .diagonal-cut {
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
            }

            /* Footer link hover */
            .footer-link {
            transition: color 0.2s ease, padding-left 0.2s ease;
            }
            .footer-link:hover {
            color: #e63946;
            padding-left: 6px;
            }

            /* Social icon */
            .social-icon {
            transition: transform 0.25s ease, background 0.25s ease;
            }
            .social-icon:hover {
            transform: scale(1.15);
            background: #e63946;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="relative overflow-hidden bg-gradient-to-br from-brand-dark via-brand-deeper to-brand-dark diagonal-cut">
            <div class="hero-glow"></div>
            <div class="flex items-center justify-center py-12 md:py-16n">
                <img class="h-20 md:h-28 drop-shadow-[0_0_30px_rgba(230,57,70,0.3)] transition-transform duration-500 hover:scale-105" src="imgs/LogoTipo.png" alt="Identity Fraud Logo">
            </div>
        </div>

        <nav class="sticky top-0 z-50 bg-brand-deeper/90 backdrop-blur-xl border-b border-white/5">
            <div class="max-w-7xl mx-auto px-4">
                <ul class="flex items-center justify-center gap-1 md:gap-2 py-3 overflow-x-auto text-sm md:text-base font-display">
                        <li><a href="/" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Início</a></li>
                        <li><a href="{{route('players.index')}}" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Jogadores</a></li>
                        <li><a href="news/newspage.php" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Notícias</a></li>
                        <li><a href="Players/voting.php" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Votos</a></li>
                        <li><a href="Feed/feed.php" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Feed</a></li>
                        <li><a href="about/about.php" class="nav-link px-3 py-2 text-brand-light font-semibold tracking-wide hover:text-brand-accent transition-colors">Sobre</a></li>
                        <li><a href="user/user.php" class="ml-2 px-4 py-2 bg-brand-accent/10 border border-brand-accent/30 rounded-full text-brand-accent font-semibold tracking-wide hover:bg-brand-accent/20 transition-all">Bem-vindo, Admin1</a></li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
    <footer class="relative mt-16 bg-brand-deeper border-t border-white/5">
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-brand-accent/40 to-transparent"></div>
                <div class="max-w-7xl mx-auto px-4 md:px-8 py-14">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-16">

                            <!-- Links -->
                            <div>
                                <h3 class="font-display font-bold text-lg tracking-wide mb-5 text-brand-light">Links Úteis</h3>
                                <div class="flex flex-col gap-3">
                                        <a href="index.html" class="footer-link text-brand-muted text-sm font-semibold">Início</a>
                                        <a href="register/register.html" class="footer-link text-brand-muted text-sm font-semibold">Login / Registar</a>
                                        <a href="person.html" class="footer-link text-brand-muted text-sm font-semibold">Jogadores</a>
                                        <a href="noticias.html" class="footer-link text-brand-muted text-sm font-semibold">Notícias</a>
                                        <a href="votos.html" class="footer-link text-brand-muted text-sm font-semibold">Votos</a>
                                        <a href="about/about.html" class="footer-link text-brand-muted text-sm font-semibold">Sobre</a>
                                </div>
                            </div>

                            <!-- Contacts -->
                            <div>
                                <h3 class="font-display font-bold text-lg tracking-wide mb-5 text-brand-light">Contactos</h3>
                                <div class="flex flex-col gap-4">
                                        <div class="flex items-center gap-3 text-brand-muted text-sm">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-brand-accent/10">
                                                    <img src="imgs/telephone.png" alt="Telefone" class="w-4 h-4 brightness-200">
                                            </div>
                                            +351-933441581
                                        </div>
                                        <div class="flex items-center gap-3 text-brand-muted text-sm">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-brand-accent/10">
                                                    <img src="imgs/envelope.png" alt="Email" class="w-4 h-4 brightness-200">
                                            </div>
                                            Support@IdentityFraud.com
                                        </div>
                                </div>
                            </div>

                            <!-- Brand -->
                            <div>
                                <h3 class="font-display font-bold text-lg tracking-wide mb-5 text-brand-light">Identity Fraud</h3>
                                <p class="text-brand-muted text-sm leading-relaxed mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia veniam expedita quod odit quaerat maiores.</p>
                                <div class="flex items-center gap-3">
                                    <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/5">
                                        <img src="imgs/facebook.png" alt="Facebook" class="w-5 h-5 brightness-200">
                                    </a>
                                    <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/5">
                                        <img src="imgs/youtube.png" alt="YouTube" class="w-5 h-5 brightness-200">
                                    </a>
                                    <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/5">
                                        <img src="imgs/insta.png" alt="Instagram" class="w-5 h-5 brightness-200">
                                    </a>
                                    <a href="#" class="social-icon w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/5">
                                        <img src="imgs/tiktok.png" alt="TikTok" class="w-5 h-5 brightness-200">
                                    </a>
                            </div>
                        </div>
                </div>

                    <!-- Divider -->
                <div class="mt-12 pt-6 border-t border-white/5">
                        <p class="text-center text-brand-muted text-xs tracking-wider font-display">&copy; Copyright 2026. Todos os direitos reservados.</p>
                </div>
            </div>
    </footer>
</html>
