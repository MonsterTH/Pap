<div wire:poll.1s.keep-alive class="space-y-4">

    {{-- Comment List --}}
    @foreach($comments as $comment)
        <div class="bg-brand-card border border-white/5 rounded-xl p-4">

                    <div class="flex items-center gap-3 mb-2">
                        <img class="w-8 h-8 rounded-full bg-white/10" src="{{ $comment->user->profile_picture ? (Str::startsWith($comment->user->profile_picture, 'http') ? $comment->user->profile_picture : asset('storage/' . $comment->user->profile_picture )) : asset('storage/images/default.png') }}">
                        <div>
                            <p class="text-sm font-semibold">{{ $comment->user->name }}</p>
                            <p class="text-xs text-brand-muted">{{$comment->created_at}}</p>
                        </div>
                    </div>

                    <p class="text-sm text-brand-light">
                        {{$comment->content}}
                    </p>

                    <hr class="my-3 border-white/10">

                    <div class="flex justify-between text-xs">

                        <button class="flex items-center gap-2 hover:text-brand-accent transition">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" /></svg>
                            <span>Share</span>
                        </button>

                    </div>

                </div>

    @endforeach
</div>
