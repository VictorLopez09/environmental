<x-layouts.app>
    
    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <div class="container max-w-7xl text-center flex flex-col md:flex-row">
            <div class="w-full max-w-xl bg-gray-200 rounded-lg shadow-lg p-4 mx-auto md:max-w-2xl lg:max-w-3xl"> <!-- Contenedor centrado y responsivo -->
                <h2 class="text-base font-semibold text-center mb-4">Estado de Validación de Imágenes</h2>
                <ul class="space-y-4"> <!-- Aumentado el espacio entre elementos -->
                    @foreach ($images as $image)
                        <li class="flex flex-col md:flex-row items-center md:justify-between p-2 border-b border-gray-300">
                            <div class="flex items-center space-x-4 mb-4 md:mb-0"> <!-- Contenedor para la imagen y el título -->
                                <img src="{{ url('storage/images/' . $image->path) }}" 
                                    alt="{{ $image->alt }}" 
                                    class="w-24 h-24 object-cover rounded-lg border-2 border-gray-300"> <!-- Imagen con tamaño fijo y borde -->
                                <span class="text-sm font-semibold">{{ $image->title }}</span> <!-- Título de la imagen -->
                            </div>
                            <div class="flex flex-col text-base md:flex-row items-center space-x-0 md:space-x-2 space-y-2 md:space-y-0"> <!-- Contenedor para el estado y los botones -->
                                <span class="text-sm font-bold {{ $image->is_validated ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $image->is_validated ? 'Validada' : 'No validada' }}
                                </span>

                                <a href="{{ route('validate.edit', ['validate' => $image->id]) }}" class="px-4 py-2 text-base bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition duration-200">
                                    {{ $image->is_validated ? 'Desvalidar' : 'Validar' }}
                                </a>

                                <form action="{{ route('validate.destroy', $image->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta imagen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-base bg-red-500 text-white font-semibold rounded-lg shadow hover:bg-red-600 transition duration-200">
                                        Eliminar
                                    </button>
                                </form>
                                
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    
</x-layouts.app>
