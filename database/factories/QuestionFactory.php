<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'form_id' => \App\Models\Form::factory(), // Relación con formulario
            'question_text' => $this->faker->sentence(5), // Pregunta falsa
            'points' => $this->faker->numberBetween(1, 10), // Puntos entre 1 y 10
        ];
    }
}
