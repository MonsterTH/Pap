    @extends('layouts')
    @section('title', 'Identity Fraud - Feed')

    @section('content')

    <!-- TOP BAR -->
    <div class="fade-up fade-up-d1 max-w-3xl mx-auto mt-7">

        <div class="bg-brand-card border border-white/5 rounded-2xl p-4 shadow-lg">

            <!-- SEARCH + USER -->
            <div class="flex items-center gap-4">

                <!-- Search Bar -->
                <form method="GET" action="{{ route('feed.index') }}" class="flex-1 relative">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search posts, users..."
                class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white placeholder:text-brand-muted focus:outline-none focus:ring-2 focus:ring-brand-accent">

            <!-- Search Icon -->
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-brand-muted">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 5.25 5.25a7.5 7.5 0 0 0 11.4 11.4Z" />
            </svg>

        </form>

                <!-- User Icon -->
                <a href="{{ route('profile.index', auth()->user()->id) }}">
                    <img src="{{ auth()->user()->profile_picture
                        ? (Str::startsWith(auth()->user()->profile_picture, 'http')
                            ? auth()->user()->profile_picture
                            : asset('storage/' . auth()->user()->profile_picture))
                        : asset('storage/images/default.png') }}"
                        class="w-12 h-12 rounded-full object-cover border border-white/10 hover:scale-105 transition">
                </a>

            </div>

                <!-- OPTION BUTTONS -->
                <div class="grid grid-cols-2 gap-3 mt-4">

                    <a href="{{ route('feed.index', ['filter' => 'foryou']) }}"
                    class="w-full py-3 rounded-xl text-sm font-semibold text-center transition
                    {{ request('filter', 'foryou') == 'foryou'
                            ? 'bg-brand-accent text-white'
                            : 'bg-white/5 border border-white/10 text-brand-light hover:bg-white/10' }}">

                        For You
                    </a>

                    <a href="{{ route('feed.index', ['filter' => 'following']) }}"
                    class="w-full py-3 rounded-xl text-sm font-semibold text-center transition
                    {{ request('filter') == 'following'
                            ? 'bg-brand-accent text-white'
                            : 'bg-white/5 border border-white/10 text-brand-light hover:bg-white/10' }}">

                        Following
                    </a>

                </div>

        </div>
    </div>

    <!-- POSTS -->
    <div class="fade-up fade-up-d2 space-y-8 mt-8">

        @if($noFollowing)
            <div class="max-w-lg mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 text-center text-brand-muted">
                Youre not following anyone yet. Follow people to see their posts here.
            </div>
        @endif

        @foreach ($posts as $post)

            @if($post->image == Null)

                <div class="max-w-lg mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ auth()->user()->profile_picture ? (Str::startsWith($post->user->profile_picture, 'http') ? auth()->user()->profile_picture : asset('storage/' . auth()->user()->profile_picture)) : asset('storage/images/default.png') }}"
                            class="w-10 h-10 rounded-full bg-white/10">

                        <div>
                            <a href="{{ route('profile.show', $post->user->id ) }}"
                                class="text-white font-semibold">
                                {{ $post->user->name }}
                            </a>

                            <p class="text-xs text-brand-muted">
                                {{ $post->date }}
                            </p>
                        </div>
                    </div>

                    <p class="text-brand-light leading-relaxed">
                        {{ $post->content }}
                    </p>

                    <hr class="my-4 border-white/10">

                    <div class="flex justify-between text-sm">

                        <livewire:like-button :post="$post" :key="$post->id" />

                        <a href="{{ route('feed.show', $post->id) }}">
                            <button class="flex items-center gap-2 hover:text-brand-accent transition">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <span>COMMENTS</span>
                            </button>
                        </a>

                            <button
                                x-data
                                @click="
                                    window.dispatchEvent(
                                        new CustomEvent('open-share', {
                                            detail: {
                                                url: '{{ route('feed.show', $post->id) }}'
                                            }
                                        })
                                    )
                                "
                                class="flex items-center gap-2 hover:text-brand-accent transition"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                </svg>

                                <span>Share</span>
                            </button>

                    </div>

                </div>

            @else

                <div class="max-w-lg mx-auto bg-brand-card border border-white/5 rounded-2xl p-6 shadow-lg">

                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ auth()->user()->profile_picture ? (Str::startsWith($post->user->profile_picture, 'http') ? $post->user->profile_picture : asset('storage/' . $post->user->profile_picture )) : asset('storage/images/default.png') }}"
                        class="w-10 h-10 rounded-full bg-white/10">
                        <div>
                            <a href="{{ route('profile.show', $post->user->id ) }}" class="text-white font-semibold">{{ $post->user->name }}</a>
                            <p class="text-xs text-brand-muted">{{ $post->date }}</p>
                        </div>
                    </div>

                    <p class="text-brand-light leading-relaxed mb-4">
                        {{$post->content }}
                    </p>

                    <img src="{{'storage/' . $post->image }}"
                        class="w-full max-h-96 object-cover rounded-xl border border-white/5 mb-4">

                    <hr class="my-4 border-white/10">

                    <div class="flex justify-between text-sm">

                        <livewire:like-button :post="$post" :key="$post->id" />

                        <a href="{{ route('feed.show', $post->id) }}">
                        <button class="flex items-center gap-2 hover:text-brand-accent transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /> </svg>
                            <span>COMMENTS</span>
                        </button>
                        </a>

                            <button
                                x-data
                                @click="
                                    window.dispatchEvent(
                                        new CustomEvent('open-share', {
                                            detail: {
                                                url: '{{ route('feed.show', $post->id) }}'
                                            }
                                        })
                                    )
                                "
                                class="flex items-center gap-2 hover:text-brand-accent transition"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                </svg>

                                <span>Share</span>
                            </button>

                        </div>

                </div>

            @endif

        @endforeach

        <div class="mt-8 flex justify-center">
            {{ $posts->links() }}
        </div>

    </div>
    {{-- SHARE MODAL --}}
    <div
        x-data="{
            open: false,
            shareUrl: '',
            copied: false,

            copy() {
                navigator.clipboard.writeText(this.shareUrl)

                this.copied = true

                setTimeout(() => {
                    this.copied = false
                }, 2000)
            }
        }"

        x-on:open-share.window="
            shareUrl = $event.detail.url
            open = true
        "
    >

        <!-- BACKDROP -->
        <div
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 bg-black/70 z-40"
            @click="open = false"
            style="display:none;"
        ></div>

        <!-- MODAL -->
        <div
            x-show="open"
            x-transition
            class="fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2
                w-[95%] max-w-md bg-brand-card border border-white/10
                rounded-2xl p-6 z-50 shadow-2xl"
            style="display:none;"
        >

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-5">

                <h2 class="text-xl font-bold text-white">
                    Share
                </h2>

                <button
                    @click="open = false"
                    class="text-white/60 hover:text-white"
                >
                    ✕
                </button>

            </div>

            <!-- APPS -->
            <div class="grid grid-cols-4 gap-4 mb-6">

                <!-- WHATSAPP -->
                <a
                    :href="`https://wa.me/?text=${encodeURIComponent(shareUrl)}`"
                    target="_blank"
                    class="flex flex-col items-center gap-2"
                >
                    <div class="w-14 h-14 rounded-full bg-green-500 flex items-center justify-center text-white text-xl">
                        W
                    </div>

                    <span class="text-xs text-white">
                        WhatsApp
                    </span>
                </a>

                <!-- DISCORD -->
                <a
                    :href="`https://discord.com/channels/@me`"
                    target="_blank"
                    class="flex flex-col items-center gap-2"
                >
                    <div class="w-14 h-14 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xl">
                        D
                    </div>

                    <span class="text-xs text-white">
                        Discord
                    </span>
                </a>

                <!-- TWITTER -->
                <a
                    :href="`https://twitter.com/intent/tweet?url=${encodeURIComponent(shareUrl)}`"
                    target="_blank"
                    class="flex flex-col items-center gap-2"
                >
                    <div class="w-14 h-14 rounded-full bg-sky-500 flex items-center justify-center text-white text-xl">
                        X
                    </div>

                    <span class="text-xs text-white">
                        Twitter
                    </span>
                </a>

                <!-- FACEBOOK -->
                <a
                    :href="`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`"
                    target="_blank"
                    class="flex flex-col items-center gap-2"
                >
                    <div class="w-14 h-14 rounded-full bg-blue-600 flex items-center justify-center text-white text-xl">
                        F
                    </div>

                    <span class="text-xs text-white">
                        Facebook
                    </span>
                </a>

            </div>

            <!-- LINK BOX -->
            <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-3">

                <input
                    type="text"
                    x-model="shareUrl"
                    readonly
                    class="bg-transparent flex-1 text-sm text-white outline-none"
                >

                <button
                    @click="copy()"
                    class="bg-brand-accent hover:opacity-90 text-white px-4 py-2 rounded-lg text-sm font-semibold transition"
                >
                    <span x-show="!copied">
                        Copy
                    </span>

                    <span x-show="copied">
                        Copied!
                    </span>
                </button>

            </div>

        </div>

    </div>
    @endsection
