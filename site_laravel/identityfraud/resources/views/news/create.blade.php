@extends('layouts')

@section('content')
    <div class="flex min-h-screen bg-brand-dark">

        {{-- Sidebar --}}
        <aside class="w-64 bg-brand-card p-6 flex flex-col">
            <div class="mb-6">
                <img src="/scripts/Pap/imgs/LogoTipo.png" alt="Logo" class="w-32 mx-auto">
            </div>

            <nav class="flex-1">
                <h3 class="text-brand-accent font-bold mb-2">Jogadores</h3>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Gerenciar</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Adicionar</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Remover</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Consulta</a>

                <h3 class="text-brand-accent font-bold mt-6 mb-2">Eventos</h3>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Votações</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Atividades</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Bounty's</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Seasons</a>

                <h3 class="text-brand-accent font-bold mt-6 mb-2">Misc</h3>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Histórico de Seasons</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Notícias</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-white/10">Criar Admin</a>
                <a href="/scripts/Pap/home.php" class="block px-3 py-2 rounded hover:bg-white/10">Página Principal</a>
            </nav>

            <p class="mt-auto text-center text-sm text-white/60">Bem-vindo, {{ auth()->user()->name ?? 'Admin' }}</p>
            </aside>

                    <div class="max-w-8xl mt-4 h-50 mx-auto bg-brand-card border border-white/5 rounded-2xl p-8 shadow-lg">

                        <h1 class="text-3xl font-extrabold mb-6 text-center">
                            Criar Notícia
                        </h1>

                        <form class="grid md:grid-cols-2 gap-6">

                            <!-- LEFT SIDE -->
                            <div class="space-y-5">

                                <!-- TITLE -->
                                <div>
                                    <label class="text-sm text-brand-muted">Título</label>
                                    <input
                                        type="text"
                                        placeholder="Ex: Novo episódio surpreende fãs"
                                        class="mt-1 w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                                </div>

                                <!-- DATE -->
                                <div>
                                    <label class="text-sm text-brand-muted">Data</label>
                                    <input
                                        type="date"
                                        class="mt-1 w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                                </div>

                                <!-- CATEGORY -->
                                <div>
                                    <label class="text-sm text-brand-muted mb-2 block">Categoria</label>

                                    <div class="grid grid-cols-3 gap-3 text-center">

                                        <label class="cursor-pointer border border-white/10 rounded-lg py-2 hover:bg-white/10 transition">
                                            <input type="radio" name="Cat" class="hidden">
                                            Trending
                                        </label>

                                        <label class="cursor-pointer border border-white/10 rounded-lg py-2 hover:bg-white/10 transition">
                                            <input type="radio" name="Cat" class="hidden">
                                            Novidades
                                        </label>

                                        <label class="cursor-pointer border border-white/10 rounded-lg py-2 hover:bg-white/10 transition">
                                            <input type="radio" name="Cat" class="hidden">
                                            Drama
                                        </label>

                                    </div>
                                </div>

                            </div>

                            <!-- RIGHT SIDE -->
                            <div class="space-y-5">

                                <!-- DESCRIPTION -->
                                <div>
                                    <label class="text-sm text-brand-muted">Descrição</label>
                                    <textarea
                                        rows="4"
                                        placeholder="Resumo da notícia..."
                                        class="mt-1 w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-brand-accent"></textarea>
                                </div>

                                <!-- IMAGE UPLOAD WITH PREVIEW -->
                                <div>
                                    <label class="text-sm text-brand-muted">Imagem</label>

                                    <label class="mt-2 flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-white/20 rounded-xl cursor-pointer hover:bg-white/5 transition overflow-hidden">

                                        <!-- PREVIEW -->
                                        <img id="preview" class="hidden w-full h-full object-cover">

                                        <!-- PLACEHOLDER -->
                                        <div id="placeholder" class="flex flex-col items-center text-sm text-white/50">
                                            📤 Upload Image
                                            <span class="text-xs mt-1">Click para adicionar</span>
                                        </div>

                                        <input id="fileInput" type="file" class="hidden">
                                    </label>

                                </div>

                            </div>

                            <!-- BUTTON -->
                            <button class="col-span-2 py-3 bg-brand-accent hover:bg-brand-glow rounded-lg font-bold uppercase text-sm transition">
                                Publicar Notícia
                            </button>

                        </form>

                    </div>

                    <script>
                    const input = document.getElementById("fileInput");
                    const preview = document.getElementById("preview");
                    const placeholder = document.getElementById("placeholder");

                    input.addEventListener("change", () => {
                        const file = input.files[0];
                        if (file) {
                            preview.src = URL.createObjectURL(file);
                            preview.classList.remove("hidden");
                            placeholder.classList.add("hidden");
                        }
                    });
                    </script>
                </main>
            </div>
@endsection
