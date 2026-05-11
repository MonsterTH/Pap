<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Like;
use App\Models\user_follower;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->filter;
        $search = $request->search;

        $noFollowing = false;

        // base query
        $postsQuery = Post::query();

        // SEARCH
        if ($search) {
            $postsQuery->where('content', 'like', "%{$search}%");
        }

        // FOLLOWING FILTER
        if ($filter === 'following') {

            $followingIds = user_follower::where('follower_id', Auth::id())
                ->pluck('user_id');

            if ($followingIds->isEmpty()) {
                $postsQuery->whereRaw('0 = 1');
                $noFollowing = true;
            } else {
                $postsQuery->whereIn('user_id', $followingIds);
            }
        }

        $posts = $postsQuery
            ->orderBy('created_at', 'desc')
            ->paginate(20)
            ->withQueryString(); // keeps search/filter in pagination links

        return view('feed.index', compact('posts', 'noFollowing'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
        'content' => 'required|max:500',
        'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'date' => now(),
        ]);

        return back()->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('comments.user')->findOrFail($id);


        return view('feed.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function like(Post $post)
    {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
                    ->where('post_id', $post->id)
                    ->first();

        if ($like) {
            $like->delete();
        }
        else {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
        }

        return back();
    }
}
