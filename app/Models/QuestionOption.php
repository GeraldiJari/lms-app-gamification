<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class QuestionOption extends Model
{
    use HasFactory;

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    
}
