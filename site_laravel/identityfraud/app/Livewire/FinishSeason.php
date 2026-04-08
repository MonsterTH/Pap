<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Season;
use App\Models\Player;

class FinishSeason extends Component
{
    public $showModal = false;
    public $season = null;
    public $winner_id = null;
    public $players = [];

    protected $listeners = ['openFinishModal' => 'open'];

    public function open($id)
    {
        $this->season = Season::findOrFail($id);
        $this->players = \App\Models\Player::orderBy('name')->get();
        $this->winner_id = null;

        if ($this->season->winner_id) return;

        $this->showModal = true;
    }

    public function finish()
    {
        $this->validate([
            'winner_id' => 'required|exists:players,id'
        ]);

        $this->season->update([
            'winner_id' => $this->winner_id
        ]);

        $this->showModal = false;

        $this->dispatch('seasonUpdated');

        $this->reset(['season', 'winner_id']);

        session()->flash('success', 'Season finalizada!');
    }

    public function render()
    {
        return view('livewire.finish-season');
    }
}
