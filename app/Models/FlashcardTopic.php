<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashcardTopic extends Model
{
    use HasFactory;

    //ghi dữ liệu hàng loạt
    protected $fillable = [
        'name',
        'description',
    ];

    public function flashcards()
    {
        return $this->hasMany(Flashcard::class, 'topic_id');
    }
}
