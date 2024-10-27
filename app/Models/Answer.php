<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Método para verificar si una respuesta es correcta
    public static function isCorrect($questionId, $answerId)
    {
        $correctAnswer = self::where('question_id', $questionId)
            ->where('is_correct', true)
            ->first();

        return $correctAnswer && $correctAnswer->id === (int)$answerId;
    }
}
