<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'word',
        'meaning',
        'pronunciation_url',
    ];

    public function topic()
    {
        return $this->belongsTo(FlashcardTopic::class, 'topic_id');
    }
}
