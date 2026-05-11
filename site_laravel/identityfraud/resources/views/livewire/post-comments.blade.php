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

                </div>

    @endforeach
</div>
