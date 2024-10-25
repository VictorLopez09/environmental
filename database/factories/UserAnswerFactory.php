<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAnswer>
 */
class UserAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Relación con usuario (si usas usuarios)
            'question_id' => \App\Models\Question::factory(), // Relación con pregunta
            'answer_id' => \App\Models\Answer::factory(), // Relación con respuesta
        ];
    }
}
