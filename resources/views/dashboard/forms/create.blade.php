<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Crear nuevo formulario
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Ingresa los detalles para crear un nuevo formulario
                </p>
            </div>
            <!-- Formulario de creación de nuevo formulario -->
            <form action="{{ route('form.store') }}" method="POST" class="mt-8 space-y-6 bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <!-- Título del Formulario -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título del Formulario</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Título" required>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar Formulario
                    </button>
                </div>
            </form>

            <!-- Lista de formularios creados -->
            <div class="mt-10">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Formularios Creados</h3>
                <ul class="space-y-4">
                    @forelse ($forms as $form)
                        <li class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center">
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">{{ $form->title }}</h4>
                                <a href="{{ route('form.show', $form->id) }}" class="text-indigo-600 hover:underline">Ver detalles</a>
                            </div>
                            <div class="flex flex-col items-end">
                                <!-- Botón de edición -->
                                <a href="{{ route('form.edit', $form->id) }}" class="text-blue-500 hover:underline mb-2">Editar</a>
                                
                                <!-- Botón de eliminación -->
                                <form action="{{ route('form.destroy', $form->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este formulario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <p class="text-gray-600">No hay formularios creados aún.</p>
                    @endforelse
                </ul>
            </div>


        </div>
    </div>
</x-layouts.app>
