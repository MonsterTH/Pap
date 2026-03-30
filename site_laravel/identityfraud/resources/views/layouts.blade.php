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

        @include('partials.logo')

        @include('partials.navbar')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
