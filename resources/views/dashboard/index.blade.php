
<x-layouts.app>
    <section class="bg-secondary flex-grow flex justify-center items-center">
        <div class="bg-tertiary container max-w-7xl shadow-lg rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-4">
                Bienvenido, {{$user->username}}
            </h1>
            
            <div class="">
                <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">
                    Proyecto sobre la Conservación de las Abejas
                </h2>
                <p class="text-gray-700">
                    Este proyecto tiene como objetivo crear conciencia sobre la importancia de las abejas en nuestro ecosistema. 
                    Las abejas no solo son responsables de la polinización de muchas plantas y cultivos, sino que también juegan un 
                    papel crucial en la biodiversidad. Sin su labor, la producción de alimentos se vería gravemente afectada.
                </p>
                <p class="text-gray-700">
                    A través de esta plataforma, aprenderás sobre las diferentes especies de abejas, sus hábitats, 
                    y cómo podemos contribuir a su conservación. ¡Únete a nosotros en la misión de proteger a estos 
                    increíbles polinizadores!
                </p>
            </div>
    
            @if (session('success'))
                <x-toast.toast message="{{ session('success') }}" type="success" />
            @elseif (session('error'))
                <x-toast.toast message="{{ session('error') }}" type="error" />
            @endif
        </div>
    </section>
</x-layouts.app>
