<x-layouts.app>

    <main class="scrollable snap-y snap-mandatory h-screen overflow-y-scroll pt-16">
        <!-- Sección 1: Bienvenido -->
        <section class="bg-cover bg-center h-screen scroll-smooth snap-center" 
            style="background-image: url('{{ Vite::asset('resources/img/img_banner_3.jpg') }}');">
            <div class="flex justify-center items-center h-full bg-black bg-opacity-40">
                <h1 class="text-white text-4xl font-bold">¡Bienvenido!</h1>
            </div>
        </section>

        <!-- Sección 2: Formulario de Contacto -->
        <section class="bg-primary p-10 h-screen scroll-smooth snap-center flex justify-center items-center">
            <div class="container max-w-7xl mx-auto text-center flex flex-col md:flex-row">
                <!-- Formulario de contacto -->
                <form class="bg-secondary shadow-lg p-6 w-full md:w-1/2 md:rounded-l-lg flex flex-col items-center h-full">
                    <h2 class="text-2xl font-bold mb-4 text-center">Formulario de Contacto</h2>
                    <!-- Campo Nombre -->
                    <div class="mb-4 w-full">
                        <label for="nombre" class="block text-base font-bold text-gray-700">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <!-- Campo Correo Electrónico -->
                    <div class="mb-4 w-full">
                        <label for="email" class="block text-base font-bold text-gray-700">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <!-- Campo Asunto -->
                    <div class="mb-4 w-full">
                        <label for="asunto" class="block text-base font-bold text-gray-700">Asunto</label>
                        <input type="text" id="asunto" name="asunto" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <!-- Campo Mensaje -->
                    <div class="mb-4 w-full">
                        <label for="mensaje" class="block text-base font-bold text-gray-700">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300"></textarea>
                    </div>
                    <!-- Botón Enviar -->
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-md p-2 hover:bg-blue-700">Enviar</button>
                </form>
        
                <!-- Imagen -->
                <img class="object-cover rounded-r-lg w-full md:w-1/2 hidden md:block" 
                    src="{{ Vite::asset('resources/img/img_banner_2.jpg') }}" 
                    alt="Imagen de contacto">
            </div>
        </section>

    </main>

    <style>
        /* CSS para ocultar la barra de desplazamiento */
        .scrollable {
            overflow-y: scroll; /* Permite el desplazamiento vertical */
            scrollbar-width: none; /* Firefox */
            scrollbar-h
        }

        .scrollable::-webkit-scrollbar {
            display: none; /* Oculta la barra de desplazamiento */
        }
    </style>
</x-layouts.app>

