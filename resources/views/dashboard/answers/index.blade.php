<x-layouts.app>
    <h2>Agregar Respuesta a la Pregunta: {{ $question->question_text }}</h2>

    <form action="{{ route('answers.store', $question->id) }}" method="POST">
        @csrf
        <div>
            <label for="answer_text">Respuesta:</label>
            <input type="text" name="answer_text" id="answer_text" required>
        </div>
        <div>
            <label for="is_correct">¿Es correcta?</label>
            <input type="checkbox" name="is_correct" id="is_correct" value="1">
        </div>
        <button type="submit">Agregar Respuesta</button>
    </form>
</x-layouts.app>
