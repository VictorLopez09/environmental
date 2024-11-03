<x-layouts.app>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-semibold text-center mb-6">Editar Respuesta</h2>

        <form action="{{ route('answers.update', $answer->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label for="answer_text" class="block text-gray-700 font-medium mb-2">Respuesta:</label>
                <input type="text" name="answer_text" id="answer_text" value="{{ $answer->answer_text }}" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" name="is_correct" id="is_correct" value="1" {{ $answer->is_correct ? 'checked' : '' }}
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="is_correct" class="ml-2 text-gray-700 font-medium">¿Es correcta?</label>
            </div>

            <div class="text-center">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                    Actualizar Respuesta
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
