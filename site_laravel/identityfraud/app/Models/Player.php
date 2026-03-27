<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'about',
        'photo',
    ];

     public function activities()
    {
        return $this->hasMany(Activity::class, 'winner_id');
    }

    public function wonSeasons()
    {
        return $this->hasMany(Season::class, 'winner_id');
    }

    public function bounties()
    {
        return $this->hasMany(Bounty::class, 'player_id');
    }

    public function targets()
    {
        return $this->hasMany(Bounty::class, 'target_id');
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'player_season');
    }

    public function evictions()
    {
        return $this->hasMany(Eviction::class);
    }
}
