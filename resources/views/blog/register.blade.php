<x-layouts.app>

    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">
        <article class="container max-w-7xl shadow-lg text-center flex flex-col md:flex-row">
            <img class="object-cover rounded-l-lg w-full md:w-1/2 hidden md:block" src="{{ Vite::asset('resources/img/img_register.jpg') }}" alt="Imagen de Registro">
            <form class="bg-secondary p-6 w-full md:rounded-r-lg flex flex-col items-center" method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="text-2xl font-bold mb-4 text-center">Formulario de Registro</h2>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                    <!-- Campo de Nombre de Usuario -->
                    <div class="mb-4">
                        <label for="username" class="block text-base font-bold text-gray-700 text-left">Nombre de Usuario: </label>
                        <input type="text" id="username" name="username" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Campo de Primer Nombre -->
                    <div class="mb-4">
                        <label for="first_name" class="block text-base font-bold text-gray-700 text-left">Nombre: </label>
                        <input type="text" id="first_name" name="first_name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Campo de Apellido -->
                    <div class="mb-4">
                        <label for="last_name" class="block text-base font-bold text-gray-700 text-left">Apellido:</label>
                        <input type="text" id="last_name" name="last_name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Campo de Correo Electrónico -->
                    <div class="mb-4">
                        <label for="email" class="block text-base font-bold text-gray-700 text-left">Correo Electrónico: </label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                        <div class="min-h-[1rem]">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
    
                    <!-- Campo de Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="block text-base font-bold text-gray-700 text-left">Contraseña</label>
                        <input type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
    
                    <!-- Campo de Confirmación de Contraseña -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-base font-bold text-gray-700 text-left">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                </div>
                <div class="min-h-[1rem]">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
    
                <!-- Botón de Registro -->
                <button type="submit" class="mt-2 w-full bg-blue-600 text-white font-semibold rounded-md p-2 hover:bg-blue-700">Registrar</button>
            </form>
        </article>
    </section>
    
</x-layouts.app>
