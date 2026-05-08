<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\user_follower;

class FollowButton extends Component
{
    public $userId;
    public $isFollowing = false;
    public $followersCount = 0; // ✅ IMPORTANT

    public function mount($userId)
    {
        $this->userId = $userId;

        $this->isFollowing = user_follower::where('user_id', $this->userId)
            ->where('follower_id', auth()->id())
            ->exists();

        $this->followersCount = user_follower::where('user_id', $this->userId)->count();
    }

    public function toggleFollow()
    {
        $authId = auth()->id();

        $follow = user_follower::where('user_id', $this->userId)
            ->where('follower_id', $authId)
            ->first();

        if ($follow) {
            $follow->delete();
            $this->isFollowing = false;
            $this->followersCount--; // safe now
        } else {
            user_follower::create([
                'user_id' => $this->userId,
                'follower_id' => $authId,
            ]);

            $this->isFollowing = true;
            $this->followersCount++; // safe now
        }
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
