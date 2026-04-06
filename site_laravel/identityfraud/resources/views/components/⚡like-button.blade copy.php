<?php

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostComments extends Component
{
    public Post $post;
    public $content = '';

    public function addComment()
    {
        $this->validate([
            'content' => 'required|max:500',
        ]);

        $this->post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $this->content,
        ]);

        $this->content = ''; // clear textarea
    }

    public function render()
    {
        $comments = $this->post->comments()->with('user')->latest()->get();

        return view('livewire.post-comments', [
            'comments' => $comments
        ]);
    }
}

?>

<div>

</div>
