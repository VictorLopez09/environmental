<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Editar Título del Formulario
                </h2>
            </div>
            <form action="{{ route('form.update', $form->id) }}" method="POST" class="mt-8 space-y-6 bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')
                <div class="rounded-md shadow-sm -space-y-px">
                    <!-- Campo para editar título -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título del Formulario</label>
                        <input type="text" name="title" id="title" value="{{ $form->title }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
