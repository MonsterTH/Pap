<div class="flex items-center w-full">

    <!-- LEFT: Followers -->
    <div class="text-center">
        <h1 class="text-sm font-bold">Followers</h1>
        <p class="text-sm text-brand-light">
            {{ $followersCount }}
        </p>
    </div>

    <!-- RIGHT: Follow button -->
    <button
        wire:click="toggleFollow"
        class="ml-auto px-5 py-2 text-white font-bold uppercase text-sm rounded-lg transition
        {{ $isFollowing ? 'bg-gray-500 hover:bg-gray-600' : 'bg-brand-accent hover:bg-brand-glow' }}"
    >
        {{ $isFollowing ? 'Unfollow' : 'Follow' }}
    </button>

</div>
