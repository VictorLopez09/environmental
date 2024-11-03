<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Support\Facades\Auth;

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
        
        // Inicializar puntuación
        $score = 0;
    
        // Supongamos que tienes una forma de calcular la puntuación
        foreach ($data['answers'] as $questionId => $answerId) {
            // Aquí puedes agregar lógica para calcular la puntuación según las respuestas
            // Por ejemplo, si `answerId` es correcto, incrementas la puntuación
            // $score += $this->calculateScore($questionId, $answerId); // Ejemplo
    
            // Si solo quieres contar respuestas correctas:
            $isCorrect = \App\Models\Answer::isCorrect($questionId, $answerId); // Implementa esta función según tu lógica
            if ($isCorrect) {
                $score += 1; // Asumimos que cada respuesta correcta suma 1 punto
            }
        }
    
        // Crear un registro en UserAnswer con el usuario y el formulario
        \App\Models\UserAnswer::create([
            'user_id' => Auth::user()->id, // Asumiendo que el usuario está autenticado
            'form_id' => $formId,
            'score' => $score, // Almacenar la puntuación calculada
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('administer', $formId)->with('success', 'Cuestionario contestado exitosamente');
    }
    
}
