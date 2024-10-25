<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function show($formId)
    {
        
        // Obtener el formulario con las preguntas y respuestas
        $form = Form::with('questions.answers')->findOrFail($formId);
        
        // Pasar el formulario a la vista
        return view('dashboard.questionnaire', compact('form'));
    }

    public function store(Request $request, $formId)
    {
        // Obtener las respuestas seleccionadas por el usuario
        $data = $request->all();

        foreach ($data['answers'] as $questionId => $answerId) {
            \App\Models\UserAnswer::create([
                'user_id' => '1', // Asumiendo que el usuario está autenticado
                'question_id' => $questionId,
                'answer_id' => $answerId,
            ]);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('questionnaire.show', $formId)->with('success', 'Cuestionario contestado exitosamente');

    }
}
