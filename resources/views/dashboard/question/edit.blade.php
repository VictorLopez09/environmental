<x-layouts.app>
    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Pregunta</h2>
            <form action="{{ route('questions.update', $question->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="question_text" class="block text-gray-700 font-semibold">Pregunta</label>
                    <input type="text" name="question_text" id="question_text" value="{{ $question->question_text }}" class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="points" class="block text-gray-700 font-semibold">Puntos</label>
                    <input type="number" name="points" id="points" value="{{ $question->points }}" class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md font-semibold">Actualizar Pregunta</button>
            </form>
        </div>
    </section>
</x-layouts.app>
