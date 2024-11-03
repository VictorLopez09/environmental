<nav class="bg-primary p-4 sticky top-0 z-20" x-data="{ isOpen: false }">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#">
                    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Logo" class="h-8"> <!-- Ajusta la altura según necesites -->
                </a>
            </div>
            

            <!-- Botón de hamburguesa -->
            <div class="flex lg:hidden">
                <button class="text-white focus:outline-none" @click="isOpen = !isOpen">
                    <!-- Icono del menú (hamburguesa) -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Links de navegación para pantallas grandes -->
            <div class="hidden lg:flex space-x-4 items-center ">
                <x-navbar.nav-link :route="route('home')">Inicio</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('gallery')">Galería</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('about-us')">Acerca</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('what-do-we-do')">¿Qué hacemos?</x-navbar.nav-link>
                <!-- <x-navbar.nav-link :route="route('contacts')">Contacto</x-navbar.nav-link> -->

                
                @guest
                    <x-navbar.nav-link :route="route('log-in')">Iniciar sesión</x-navbar.nav-link>
                    <x-navbar.nav-link :route="route('register')">Registrarse</x-navbar.nav-link>
                @endguest

                
                @auth
                <x-navbar.nav-link :route="route('dashboard')">Principal</x-navbar.nav-link>
            
                <!-- Menú desplegable para autenticación -->
                <x-navbar.dropdown>
                    <x-navbar.dropdown-link :route="route('form.index')">Cuestionario</x-navbar.nav-link>
                    <x-navbar.dropdown-link :route="route('images.index')">Compartir</x-navbar.nav-link>
            
                    @if(auth()->user()->name === 'Administrator')
                        <!-- Solo visible para 'Administrator' -->
                        <x-navbar.dropdown-link :route="route('validate.index')">Validación</x-navbar.dropdown-link>
                    @endif
            
                    @if(in_array(auth()->user()->name, ['Administrator']))
                        <!-- Visible para 'Administrator' y 'Regular' -->
                        <x-navbar.dropdown-link :route="route('form.create')">Crear cuestionario</x-navbar.dropdown-link>
                    @endif
            
                    <x-navbar.dropdown-link :route="route('logout')">Cerrar sesión</x-navbar.dropdown-link>
                </x-navbar.dropdown>
            @endauth
                       

            </div>
        </div>

        <!-- Menú desplegable para pantallas pequeñas -->
        <div 
            x-show="isOpen" 
            x-cloak
            class="lg:hidden absolute top-full left-0 w-full bg-primary z-20 transition-transform duration-300 ease-in-out" 
            @click.away="isOpen = false"
        >
            <div class="flex flex-col space-y-4 mt-4 p-4">
                <x-navbar.nav-link :route="route('home')">Inicio</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('gallery')">Galería</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('about-us')">Acerca</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('contacts')">Contacto</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('what-do-we-do')">¿Qué hacemos?</x-navbar.nav-link>
                
                @guest
                    <x-navbar.nav-link :route="route('log-in')">Iniciar sesión</x-navbar.nav-link>
                    <x-navbar.nav-link :route="route('register')">Registrarse</x-navbar.nav-link>
                    <x-navbar.nav-link :route="route('register')">Validación</x-navbar.nav-link>

                    
                @endguest

                @auth
                    
                    <x-navbar.nav-link :route="route('dashboard')">Principal</x-navbar.nav-link>
                    

                    <!-- Menú desplegable para autenticación -->
                    <x-navbar.dropdown>
                        <x-navbar.dropdown-link :route="route('logout')">Cerrar sesion</x-navbar.dropdown-link> <!-- Corrección aquí -->
                        <x-navbar.dropdown-link :route="route('form.index')">Formulario</x-navbar.nav-link>
                        <x-navbar.dropdown-link :route="route('images.index')">Compartir</x-navbar.nav-link>
                    </x-navbar.dropdown>


                @endauth
            </div>
        </div>
    </div>
</nav>
