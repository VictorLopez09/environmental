<?php

namespace Database\Seeders;

use App\Models\Form;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->count(10)->create();
        // Crear 5 formularios, cada uno con preguntas y respuestas
        Form::factory(5)->create()->each(function ($form) {
            // Cada formulario tiene entre 5 y 10 preguntas
            Question::factory(rand(5, 10))->create(['form_id' => $form->id])->each(function ($question) {
                // Cada pregunta tiene entre 2 y 4 respuestas
                Answer::factory(rand(2, 4))->create(['question_id' => $question->id]);
            });
        });

        // Crear respuestas de usuario como ejemplo
        // UserAnswer::factory(10)->create();
    }
}
