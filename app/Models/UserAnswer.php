<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // ID del usuario
        'form_id',  // ID del formulario
        'score'     // Puntuación
    ];

    public function form()
    {
        return $this->belongsTo(Form::class); // Relación con Form
    }
}
