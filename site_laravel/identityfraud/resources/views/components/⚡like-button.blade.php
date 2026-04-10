<?php

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
     public Post $post;

    public function toggleLike()
    {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
                    ->where('post_id', $this->post->id)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $this->post->id,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.likebutton', [
            'likesCount' => $this->post->likes()->count(),
            'isLiked' => $this->post->likes()
                ->where('user_id', Auth::id())
                ->exists(),
        ]);
    }
}
?>

<div>
    {{-- The only way to do great work is to love what you do. - Steve Jobs --}}
</div>
