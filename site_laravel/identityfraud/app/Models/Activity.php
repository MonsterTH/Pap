<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'start_date',
        'winner_id',
    ];

    public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }
}
