<x-layouts.app>
    <section class="py-24 bg-secondary">
        <h1 class="text-white text-4xl font-bold text-center mb-4">Galería</h1>
        <article class="container max-w-7xl mx-auto text-center">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($images as $image)
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ url('storage/images/' . $image->path) }}" alt="{{ $image->alt }}" title="{{ $image->title }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
</x-layouts.app>
