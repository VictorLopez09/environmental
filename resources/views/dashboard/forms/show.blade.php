<x-layouts.app>
    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ $form->title }}</h2>
        
            <!-- Formulario para agregar preguntas -->
            <form action="{{ route('forms.addQuestion', $form->id) }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="question_text" class="block text-gray-700 font-semibold">Pregunta</label>
                    <input type="text" name="question_text" id="question_text" class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="points" class="block text-gray-700 font-semibold">Puntos</label>
                    <input type="number" name="points" id="points" class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md font-semibold">Agregar Pregunta</button>
            </form>
        
            <!-- Lista de preguntas con respuestas -->
            <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Preguntas</h3>
            @foreach ($form->questions as $question)
                <div class="p-4 mb-6 bg-gray-50 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex justify-between items-center">
                        <div>
                            <strong class="text-lg text-gray-900">{{ $question->question_text }}</strong> 
                            <span class="text-gray-600">({{ $question->points }} puntos)</span>
                        </div>
                        <div class="flex space-x-4">
                            <!-- Botón para editar la pregunta -->
                            <a href="{{ route('questions.edit', $question->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Editar Pregunta</a>
                            
                            <!-- Botón para eliminar la pregunta -->
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta pregunta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Eliminar Pregunta</button>
                            </form>
                        </div>
                    </div>

                    <!-- Formulario para agregar respuestas -->
                    <form action="{{ route('questions.addAnswer', $question->id) }}" method="POST" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <label for="answer_text" class="block text-gray-700 font-semibold">Respuesta</label>
                            <input type="text" name="answer_text" id="answer_text" class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" name="is_correct" id="is_correct" class="form-checkbox h-4 w-4 text-blue-600" value="1">
                            <label for="is_correct" class="ml-2 text-gray-700">¿Es correcta?</label>
                        </div>
                        
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md font-semibold">Agregar Respuesta</button>
                    </form>
        
                    <!-- Lista de respuestas -->
                    <ul class="mt-4 space-y-2">
                        @foreach ($question->answers as $answer)
                            <li class="flex justify-between items-center text-gray-700">
                                <div>
                                    <span>{{ $answer->answer_text }}</span> - 
                                    <span class="{{ $answer->is_correct ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $answer->is_correct ? 'Correcta' : 'Incorrecta' }}
                                    </span>
                                </div>
                                <div class="flex space-x-4">
                                    <!-- Botón para editar la respuesta -->
                                    <a href="{{ route('answers.edit', $answer->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Editar Respuesta</a>
                                    
                                    <!-- Botón para eliminar la respuesta -->
                                    <form action="{{ route('answers.destroy', $answer->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta respuesta?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Eliminar Respuesta</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts.app>
