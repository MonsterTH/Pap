@extends('layouts')
@section('title', 'Identity Fraud - Criar Notícia')
@section('content')
    <div class="flex min-h-screen bg-brand-dark">
        @include('partials.sidebar')

        <main class="flex-1 p-8 bg-brand-dark my-auto">

            <div class="fade-up fade-up-d1 mb-8">
                <h1 class="text-3xl font-bold text-white">Criar Notícia</h1>
                <p class="text-brand-muted mt-1">Define uma nova notícia.</p>
            </div>

            <!-- ERRORS -->
            @if($errors->any())
                <div class="fade-up fade-up-d1 mb-6 bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4 text-red-400 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="fade-up fade-up-d1 mb-6 bg-green-500/10 border border-green-500/30 rounded-xl px-5 py-4 text-green-400 text-sm space-y-1">
                    {{ session('success') }}
                </div>
            @endif

            <div class="fade-up fade-up-d2 max-w-8xl mt-4 h-full mx-auto bg-brand-card border border-white/5 rounded-2xl p-8 shadow-lg">

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-6">
                    @csrf

                   <!-- LEFT SIDE -->
<div class="space-y-5">

    <!-- TITLE -->
    <div>
        <label class="text-sm text-brand-muted">Título</label>
        <input
            type="text"
            placeholder="Titulo"
            name="title"
            class="mt-1 w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
    </div>

    <!-- DATE -->
    <div>
        <label class="text-sm text-brand-muted">Data</label>
        <input
            type="date"
            name="date"
            class="mt-1 w-full bg-white/5 border border-white/10 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
    </div>

<!-- TAGS -->
<div>
    <label class="text-sm text-brand-muted mb-2 block">Tags</label>
    <div class="flex flex-wrap gap-2">
        @foreach ($tags as $tag)
            <label class="flex items-center gap-2 bg-white/5 border rounded-lg px-3 py-2 cursor-pointer hover:bg-white/10 transition
                {{ $loop->index < 4 ? 'border-brand-accent/50 has-[:checked]:border-brand-accent has-[:checked]:bg-brand-accent/10' : 'border-white/10 has-[:checked]:border-white/40 has-[:checked]:bg-white/10' }}">
                <input
                    type="checkbox"
                    name="tags[]"
                    value="{{ $tag->id }}"
                    class="accent-pink-500">
                <span class="text-sm text-white">{{ $tag->name }}</span>
            </label>
        @endforeach
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
                                name="description"
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
                                    Upload Image
                                    <span class="text-xs mt-1">Click para adicionar</span>
                                </div>

                                <input id="fileInput" name="image" type="file" class="hidden">
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
