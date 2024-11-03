<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $forms = Form::all();

        return view('dashboard.forms', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $forms = Form::all();

        return view('dashboard.forms.create', compact('forms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = Form::create($request->only('title'));

        return redirect()->route('form.show', $form->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
        return view('dashboard.forms.show', compact('form')); // Vista para mostrar el formulario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
        return view('dashboard.forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $form->update($request->only('title'));

        return redirect()->route('form.create')->with('success', 'Título actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('form.create')->with('success', 'Formulario eliminado correctamente.');
    }



    public function addQuestion(Request $request, Form $form)
    {
        $question = new Question($request->only('question_text', 'points'));
        $form->questions()->save($question);

        return redirect()->route('form.show', $form->id);
    }

    public function addAnswer(Request $request, Question $question)
    {
        $request->validate([
            'answer_text' => 'required|string',
            'is_correct' => 'nullable|boolean',
        ]);

        // Asigna 1 si el checkbox está presente, 0 en caso contrario
        $isCorrect = $request->input('is_correct') ? 1 : 0;

        $answer = new Answer([
            'answer_text' => $request->input('answer_text'),
            'is_correct' => $isCorrect,
        ]);

        $question->answers()->save($answer);

        return redirect()->route('form.show', $question->form_id);
    }
}
