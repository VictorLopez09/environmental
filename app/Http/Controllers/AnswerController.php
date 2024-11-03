<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Show the form for creating a new answer for a specific question.
     */
    public function create($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('dashboard.answers.create', compact('question'));
    }

    /**
     * Store a newly created answer in storage.
     */
    public function store(Request $request, $questionId)
    {
        $request->validate([
            'answer_text' => 'required|string|max:255',
            'is_correct' => 'nullable|boolean',
        ]);

        Answer::create([
            'question_id' => $questionId,
            'answer_text' => $request->input('answer_text'),
            'is_correct' => $request->input('is_correct', false),
        ]);

        return redirect()->route('dashboard.questions.show', $questionId)->with('success', 'Respuesta agregada correctamente.');
    }

    /**
     * Show the form for editing a specific answer.
     */
    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
        return view('dashboard.answers.edit', compact('answer'));
    }

    /**
     * Update the specified answer in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'answer_text' => 'required|string|max:255',
            'is_correct' => 'nullable|boolean',
        ]);
    
        // Find the answer by its ID and update it
        $answer = Answer::findOrFail($id);
        $answer->update($request->only('answer_text', 'is_correct'));
    
        // Retrieve the form ID associated with this answer's question
        $formId = $answer->question->form_id;
    
        // Redirect back to the form view
        return redirect()->route('form.show', $formId)->with('success', 'Respuesta actualizada correctamente.');
    }

    /**
     * Remove the specified answer from storage.
     */
    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $questionId = $answer->question_id;
        $answer->delete();

        $formId = $answer->question->form_id;
    
        // Redirect back to the form view
        return redirect()->route('form.show', $formId)->with('success', 'Respuesta eliminada correctamente.');
    }

    /**
     * Check if a specific answer is correct.
     */
    public function isCorrect($questionId, $answerId)
    {
        return Answer::isCorrect($questionId, $answerId);
    }
}
