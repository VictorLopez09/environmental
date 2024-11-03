<x-layouts.app>
    @if (session('success'))
        <x-toast.toast message="{{ session('success') }}" type="success" />
    @elseif (session('error'))
        <x-toast.toast message="{{ session('error') }}" type="error" />
    @endif

    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <div class="max-w-4xl mx-auto my-8 bg-white shadow-md rounded-lg overflow-hidden flex">
            <!-- Columna izquierda: Imagen -->
            <div class="w-1/2 h-96 flex items-center justify-center bg-gray-100">
                <img src="{{ url('storage/images/' . $image->path) }}" alt="{{ $image->title }}"
                     class="w-full h-full object-cover rounded-lg shadow-md">
            </div>

            <!-- Columna derecha: Formulario -->
            <div class="w-1/2 p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center">Actualizar el titulo</h2>

                <!-- Formulario de edición -->
                <form method="POST" action="{{ route('images.update', $image->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Campo de título -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" id="title" name="title" value="{{ $image->title }}"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               required>
                        @error('title') 
                            <span class="text-red-600 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Botón para actualizar -->
                    <div class="mb-4">
                        <button type="submit"
                                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                            Actualizar Título
                        </button>
                    </div>
                </form>

                <!-- Botón para eliminar la imagen -->
                <form method="POST" action="{{ route('images.destroy', $image->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta imagen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-red-700 transition duration-200">
                        Eliminar Imagen
                    </button>
                </form>
            </div>
            
        </div>
    </section>
</x-layouts.app>
