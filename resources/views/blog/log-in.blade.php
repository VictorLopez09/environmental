<x-layouts.app>

    <section class="bg-secondary h-full p-10 flex-grow flex justify-center items-center">

        <article class="container max-w-7xl shadow-lg mx-auto text-center flex flex-col md:flex-row">
            <img class="object-cover rounded-l-lg w-full md:w-1/2 hidden md:block" src="{{ Vite::asset('resources/img/img_login.jpg') }}" alt="image log">
            <form class="bg-secondary p-6 w-full md:rounded-r-lg flex flex-col items-center" method="POST" action="{{ route('log-in') }}">
                @csrf
                <h2 class="text-2xl font-bold mb-4 text-center">Inicio de Sesión</h2>
    
                <!-- Campo Correo Electrónico -->
                <div class="mb-4 w-full">
                    <label for="email" class="block text-base font-bold text-gray-700 text-left">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    @error('email') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
    
                <!-- Campo Contraseña -->
                <div class="mb-4 w-full">
                    <label for="password" class="block text-base font-bold text-gray-700 text-left">Contraseña</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    @error('password') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                @error('password') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
    
                <!-- Recuérdame -->
                <div class="flex items-center mb-4 w-full">
                    <input type="checkbox" id="remember_me" name="remember_me" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="remember_me" class="ml-2 block text-base font-bold text-gray-700">Recuérdame</label>
                </div>
    
                <!-- Botón de Iniciar Sesión -->
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold rounded-md p-2 hover:bg-blue-700">Iniciar Sesión</button>
    
                <!-- Enlace de Recuperar Contraseña -->
                <a href="#" class="mt-4 text-sm text-blue-600 hover: text-bold">¿Olvidaste tu contraseña?</a>
    
            </form>
        </article>
    
    </section>
    

</x-layouts.app>
