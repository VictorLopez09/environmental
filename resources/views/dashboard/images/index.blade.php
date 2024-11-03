<x-layouts.app>
    @if (session('success'))
        <x-toast.toast message="{{ session('success') }}" type="success" />
    @elseif (session('error'))
        <x-toast.toast message="{{ session('error') }}" type="error" />
    @endif

    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <div class="max-w-4xl mx-auto my-8 p-6 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Compartir Imagen</h1>

            <form method="POST" action="{{route('images.store')}}" enctype="multipart/form-data" class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Columna izquierda: Campos del formulario -->
                @csrf
                <div class="flex-1 space-y-6">
                    <!-- Título -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" id="title" wire:model="title" name="title"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               required>

                        <!-- Mostrar el error si hay problemas con el campo 'title' -->
                        @error('title') 
                            <span class="text-red-600 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Imagen -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
                        <input type="file" id="image" wire:model="image" name="image"
                               class="mt-1 p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                               accept="image/*" required>

                        <!-- Mostrar el error si hay problemas con el campo 'image' -->
                        @error('image') 
                            <span class="text-red-600 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Botón para subir -->
                    <div>
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Subir Imagen
                        </button>
                    </div>
                </div>

                <!-- Columna derecha: Previsualización de la imagen -->
                <div class="flex-shrink-0 w-60 h-60 bg-gray-200 flex justify-center items-center rounded-lg" id="image-preview-container" style="display: none;">
                    <img id="image-preview" src="" alt="Previsualización"
                        class="w-60 h-60 object-contain transition-transform duration-300 ease-in-out">
                </div>
            </form>

            <!-- Lista de imágenes existentes -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Imágenes Subidas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($images as $image)
                    <div class="flex justify-center items-center flex-col">
                        <div class="bg-gray-100 rounded-lg shadow-md p-4 w-40 h-52 flex flex-col items-center mx-auto">
                            <!-- Previsualización en miniatura -->
                            <img src="{{ url('storage/images/' . $image->path) }}" alt="{{ $image->title }}" class="w-full h-32 object-cover rounded-lg mb-2">
                            <div class="text-center">
                                <a href="{{ route('images.edit', $image->id) }}">
                                    <h3 class="text-sm font-semibold">{{ $image->title }}</h3>
                                </a>
                                <p class="text-xs {{ $image->is_validated ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $image->is_validated ? 'Validado' : 'No Validado' }}
                                </p>
                            </div>
                        </div>
                    </div>


                    @endforeach
                </div>
                <div class="mt-5">
                    {{$images->links()}}
                </div>
                
            </div>
            
        </div>
    </section>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'flex'; // Mostrar previsualización
                };

                reader.readAsDataURL(file);

            } else {
                imagePreviewContainer.style.display = 'none'; // Ocultar si no hay archivo seleccionado
            }
        });
    </script>
</x-layouts.app>
