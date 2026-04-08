<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Season;

class SeasonIndex extends Component
{
    protected $listeners = ['seasonUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.season-index', [
            'seasons' => Season::with('winner')->latest()->get(),
        ])->extends('layouts')
          ->section('content');
    }
}
