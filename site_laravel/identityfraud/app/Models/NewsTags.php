<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTags extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_id',
        'news_id'
    ];

    public function tags()
    {
        return $this->belongsTo(Tags::class);
    }
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
