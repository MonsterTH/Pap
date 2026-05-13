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
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M15,3c-6.627,0 -12,5.373 -12,12c0,2.25121 0.63234,4.35007 1.71094,6.15039l-1.60352,5.84961l5.97461,-1.56836c1.74732,0.99342 3.76446,1.56836 5.91797,1.56836c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12zM10.89258,9.40234c0.195,0 0.39536,-0.00119 0.56836,0.00781c0.214,0.005 0.44692,0.02067 0.66992,0.51367c0.265,0.586 0.84202,2.05608 0.91602,2.20508c0.074,0.149 0.12644,0.32453 0.02344,0.51953c-0.098,0.2 -0.14897,0.32105 -0.29297,0.49805c-0.149,0.172 -0.31227,0.38563 -0.44727,0.51563c-0.149,0.149 -0.30286,0.31238 -0.13086,0.60938c0.172,0.297 0.76934,1.27064 1.65234,2.05664c1.135,1.014 2.09263,1.32561 2.39063,1.47461c0.298,0.149 0.47058,0.12578 0.64258,-0.07422c0.177,-0.195 0.74336,-0.86411 0.94336,-1.16211c0.195,-0.298 0.39406,-0.24644 0.66406,-0.14844c0.274,0.098 1.7352,0.8178 2.0332,0.9668c0.298,0.149 0.49336,0.22275 0.56836,0.34375c0.077,0.125 0.07708,0.72006 -0.16992,1.41406c-0.247,0.693 -1.45991,1.36316 -2.00391,1.41016c-0.549,0.051 -1.06136,0.24677 -3.56836,-0.74023c-3.024,-1.191 -4.93108,-4.28828 -5.08008,-4.48828c-0.149,-0.195 -1.21094,-1.61031 -1.21094,-3.07031c0,-1.465 0.76811,-2.18247 1.03711,-2.48047c0.274,-0.298 0.59492,-0.37109 0.79492,-0.37109z"></path></g></g>
                        </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40.lllll000" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M25.12,6.946c-2.424,-1.948 -6.257,-2.278 -6.419,-2.292c-0.256,-0.022 -0.499,0.123 -0.604,0.357c-0.004,0.008 -0.218,0.629 -0.425,1.228c2.817,0.493 4.731,1.587 4.833,1.647c0.478,0.278 0.638,0.891 0.359,1.368c-0.185,0.318 -0.52,0.496 -0.864,0.496c-0.171,0 -0.343,-0.043 -0.501,-0.135c-0.028,-0.017 -2.836,-1.615 -6.497,-1.615c-3.662,0 -6.471,1.599 -6.499,1.615c-0.477,0.277 -1.089,0.114 -1.366,-0.364c-0.277,-0.476 -0.116,-1.087 0.36,-1.365c0.102,-0.06 2.023,-1.158 4.848,-1.65c-0.218,-0.606 -0.438,-1.217 -0.442,-1.225c-0.105,-0.235 -0.348,-0.383 -0.604,-0.357c-0.162,0.013 -3.995,0.343 -6.451,2.318c-1.284,1.186 -3.848,8.12 -3.848,14.115c0,0.106 0.027,0.209 0.08,0.301c1.771,3.11 6.599,3.924 7.699,3.959c0.007,0.001 0.013,0.001 0.019,0.001c0.194,0 0.377,-0.093 0.492,-0.25l1.19,-1.612c-2.61,-0.629 -3.99,-1.618 -4.073,-1.679c-0.444,-0.327 -0.54,-0.953 -0.213,-1.398c0.326,-0.443 0.95,-0.541 1.394,-0.216c0.037,0.024 2.584,1.807 7.412,1.807c4.847,0 7.387,-1.79 7.412,-1.808c0.444,-0.322 1.07,-0.225 1.395,0.221c0.324,0.444 0.23,1.066 -0.212,1.392c-0.083,0.061 -1.456,1.048 -4.06,1.677l1.175,1.615c0.115,0.158 0.298,0.25 0.492,0.25c0.007,0 0.013,0 0.019,-0.001c1.101,-0.035 5.929,-0.849 7.699,-3.959c0.053,-0.092 0.08,-0.195 0.08,-0.301c0,-5.994 -2.564,-12.928 -3.88,-14.14zM11,19c-1.105,0 -2,-1.119 -2,-2.5c0,-1.381 0.895,-2.5 2,-2.5c1.105,0 2,1.119 2,2.5c0,1.381 -0.895,2.5 -2,2.5zM19,19c-1.105,0 -2,-1.119 -2,-2.5c0,-1.381 0.895,-2.5 2,-2.5c1.105,0 2,1.119 2,2.5c0,1.381 -0.895,2.5 -2,2.5z"></path></g></g>
                        </svg>
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
                    <div class="w-14 h-14 rounded-full bg-slate-900 flex items-center justify-center text-white text-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M26.37,26l-8.795,-12.822l0.015,0.012l7.93,-9.19h-2.65l-6.46,7.48l-5.13,-7.48h-6.95l8.211,11.971l-0.001,-0.001l-8.66,10.03h2.65l7.182,-8.322l5.708,8.322zM10.23,6l12.34,18h-2.1l-12.35,-18z"></path></g></g>
                        </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M15,3c-6.627,0 -12,5.373 -12,12c0,6.016 4.432,10.984 10.206,11.852v-8.672h-2.969v-3.154h2.969v-2.099c0,-3.475 1.693,-5 4.581,-5c1.383,0 2.115,0.103 2.461,0.149v2.753h-1.97c-1.226,0 -1.654,1.163 -1.654,2.473v1.724h3.593l-0.487,3.154h-3.106v8.697c5.857,-0.794 10.376,-5.802 10.376,-11.877c0,-6.627 -5.373,-12 -12,-12z"></path></g></g>
                        </svg>
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
