<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions.
     */
    public function index()
    {
        return  redirect()->route('form.create');
    }

    /**
     * Show the form for creating a new question.
     */
    public function create()
    {
        $forms = Form::all(); // Obtener todos los formularios

        return view('dashboard.forms.create', compact('forms'));
    }

    /**
     * Store a newly created question in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'form_id' => 'required|exists:forms,id',
            'question_text' => 'required|string|max:255',
            'points' => 'required|integer|min:1',
        ]);

        Question::create($request->only('form_id', 'question_text', 'points'));

        return redirect()->route('dashboard.question.index')->with('success', 'Pregunta creada correctamente.');
    }

    /**
     * Display the specified question.
     */
    public function show(string $id)
    {
        $question = Question::with('answers')->findOrFail($id);
        return view('dashboard.question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        return view('dashboard.question.edit', compact('question'));
    }

    /**
     * Update the specified question in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'points' => 'required|integer|min:1',
        ]);
    
        // Find the question by ID and update it
        $question = Question::findOrFail($id);
        $question->update($request->only('question_text', 'points'));
    
        // Retrieve the form ID associated with this question
        $formId = $question->form_id;
    
        // Redirect back to the form view
        return redirect()->route('form.show', $formId)->with('success', 'Pregunta actualizada correctamente.');
    }

    /**
     * Remove the specified question from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Pregunta eliminada correctamente.');
    }
}
