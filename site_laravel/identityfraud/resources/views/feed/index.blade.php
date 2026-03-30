@extends('layouts')
@section('title', 'News - Identity Fraud')

@section('content')

<!-- SIDE INFO -->
<div class="bg-brand-card border border-white/5 rounded-2xl p-6 text-center shadow-lg">

    <img class="w-20 h-20 rounded-full mx-auto mb-4 object-cover bg-white/10">

    <h1 class="text-lg font-bold text-white">{{$user->name}}</h1>

    <p class="text-sm text-brand-muted mt-2">
        Posts: X | Likes: 0
    </p>

    <hr class="my-4 border-white/10">
</div>

<!-- POSTS -->
<div class="space-y-8 mt-8">

    <!-- POST WITHOUT IMAGE -->
    <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

        <div class="flex items-center gap-3 mb-3">
            <img class="w-10 h-10 rounded-full bg-white/10">
            <div>
                <p class="text-white font-semibold">{{$user->name}}</p>
                <p class="text-xs text-brand-muted">DATE</p>
            </div>
        </div>

        <p class="text-brand-light leading-relaxed">
            POST CONTENT
        </p>

        <hr class="my-4 border-white/10">

        <div class="flex justify-between text-sm">

            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                <img src="../imgs/Like.png" class="w-5">
                <span>LIKES</span>
            </button>

            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                <img src="../imgs/Comment.png" class="w-5">
                <span>COMMENTS</span>
            </button>

            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                <img src="../imgs/Share.png" class="w-5">
                <span>Share</span>
            </button>

        </div>

    </div>

    <!-- POST WITH IMAGE -->
    <div class="bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

        <div class="flex items-center gap-3 mb-3">
            <img class="w-10 h-10 rounded-full bg-white/10">
            <div>
                <p class="text-white font-semibold">{{$user->name}}</p>
                <p class="text-xs text-brand-muted">DATE</p>
            </div>
        </div>

        <p class="text-brand-light leading-relaxed mb-4">
            POST CONTENT
        </p>

        <img src="../imgs/imgs_saves/IMAGE"
             class="w-full max-h-96 object-cover rounded-xl border border-white/5 mb-4">

        <hr class="my-4 border-white/10">

        <div class="flex justify-between text-sm">

            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                <img src="../imgs/Like.png" class="w-5">
                <span>LIKES</span>
            </button>

            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                <img src="../imgs/Comment.png" class="w-5">
                <span>COMMENTS</span>
            </button>

            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                <img src="../imgs/Share.png" class="w-5">
                <span>Share</span>
            </button>

        </div>

    </div>

</div>
@endsection
