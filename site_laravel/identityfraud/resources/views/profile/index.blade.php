@extends('layouts')
    @section('title', 'Identity Fraud')
    @section('content')
    <main class="max-w-5xl mx-auto px-4 md:px-8 py-10">

        <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg relative">

            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-full bg-white/10">

                <div>
                    <h1 class="text-xl font-bold">USERNAME</h1>
                    <p class="text-sm text-brand-muted">Join Date | Posts</p>
                    <p class="text-sm text-brand-light">DATE | POSTS</p>
                </div>
            </div>

            <!-- DROPDOWN -->
            <div class="absolute top-4 right-4">
                <button id='dropdownBtn' class="text-xl px-3 py-1 bg-white/10 rounded-lg hover:bg-white/20 transition">
                    ≡
                </button>

                <div id='dropdownMenu' class="mt-2 hidden bg-brand-card border border-white/10 rounded-lg shadow-lg p-2 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm hover:bg-white/10 rounded">Editar Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 text-sm hover:bg-white/10 rounded">
                                Sair
                            </button>
                        </form>
                    <a href="#" class="block px-3 py-2 text-sm hover:bg-white/10 rounded">Admin</a>
                </div>
            </div>

            <script>
                const btn = document.getElementById("dropdownBtn");
                const menu = document.getElementById("dropdownMenu");

                btn.addEventListener("click", () => {
                    menu.classList.toggle("hidden");
                });
            </script>
        </div>

    </main>

    <!-- POST INPUT -->
    <section class="max-w-3xl mx-auto px-4 md:px-8 pb-10">

        <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

            <div class="flex items-center gap-3 mb-4">
                <img class="w-10 h-10 rounded-full bg-white/10">
                <p class="font-semibold">USERNAME</p>
            </div>

            <form class="space-y-4">

                <textarea
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-sm text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-brand-accent"
                    maxlength="500"
                    placeholder="What's going on your mind?">
                </textarea>

                <hr class="border-white/10">

                <div class="flex items-center justify-between">

                    <label class="cursor-pointer flex items-center gap-2 text-sm hover:text-brand-accent transition">
                        <img src="../imgs/ImageAttach.png" class="w-5">
                        Add Image
                        <input type="file" class="hidden">
                    </label>

                    <button class="px-5 py-2 bg-brand-accent hover:bg-brand-glow text-white font-bold uppercase text-sm rounded-lg transition">
                        Post
                    </button>

                </div>

            </form>

        </div>

    </section>
@endsection
