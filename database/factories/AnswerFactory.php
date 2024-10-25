<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => \App\Models\Question::factory(), // Relación con pregunta
            'answer_text' => $this->faker->sentence(6), // Respuesta falsa
            'is_correct' => $this->faker->boolean(25), // 25% de probabilidad de que sea correcta
        ];
    }
}
