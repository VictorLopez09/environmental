<article class="container max-w-7xl">
    <!-- Input de búsqueda -->
    <div class="mb-6">
        <input 
            type="text" 
            class="w-full p-4 border rounded-md" 
            placeholder="Buscar formularios..." 
            wire:model.live="search"
        >
    </div>

    @if($forms->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($forms as $form)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $form->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $form->description }}</p>

                    @if ($form->completed)
                        <p class="text-green-600 mb-2">Calificación: {{ $form->score }} puntos</p>
                    @else
                        <a href="{{ route('assessment', $form->id) }}" class="text-blue-500 hover:underline">Ver más detalles</a>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $forms->links() }}
        </div>
    @else
        <div class="text-center mt-10">
            <p class="text-gray-600">No se encontraron formularios.</p>
        </div>
    @endif
</article>
