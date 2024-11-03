<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    //
    public function show($formId)
    {
        $user = Auth::user(); // Asegúrate de usar 'user' en minúscula

        // Verifica si el usuario ya completó el cuestionario específico
        $completed = UserAnswer::where('user_id', $user->id)
            ->where('form_id', $formId)
            ->exists(); // Cambié a exists para una consulta más eficiente

        if ($completed) {
            // Si ya completó el cuestionario, redirige o muestra un mensaje
            return redirect()->route('dashboard')->with('success', 'Ya has completado este cuestionario.');
        }

        // Obtener el formulario con las preguntas y respuestas
        $form = Form::with('questions.answers')->findOrFail($formId);

        // Pasar el formulario a la vista
        return view('dashboard.assessment', compact('form'));
    }


    public function store(Request $request, $formId)
    {
        $user = Auth::user();

        // Verifica si el usuario ya completó el cuestionario específico
        $completed = UserAnswer::where('user_id', $user->id)
            ->where('form_id', $formId)
            ->exists();

        if ($completed) {
            return redirect()->route('home')->with('message', 'Ya has completado este cuestionario.');
        }

        // Obtener las respuestas seleccionadas por el usuario
        $data = $request->all();

        // Verificar si hay respuestas en el array
        if (empty($data['answers']) || !is_array($data['answers'])) {
            return redirect()->route('assessment', $formId)
                ->with('error', 'Por favor selecciona al menos una respuesta para cada pregunta.');
        }

        // Inicializar puntuación
        $score = 0;

        // Calcular la puntuación según las respuestas
        foreach ($data['answers'] as $questionId => $answerId) {
            $isCorrect = \App\Models\Answer::isCorrect($questionId, $answerId);
            if ($isCorrect) {
                $score += 1; // Asumimos que cada respuesta correcta suma 1 punto
            }
        }

        // Crear un registro en UserAnswer con el usuario y el formulario
        UserAnswer::create([
            'user_id' => $user->id,
            'form_id' => $formId,
            'score' => $score,
        ]);

        return redirect()->route('assessment', $formId)
            ->with('success', 'Cuestionario contestado exitosamente');
    }
}
