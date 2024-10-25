<nav class="bg-primary p-4 sticky top-0 z-50" x-data="{ isOpen: false }">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#" class="text-white text-lg font-semibold">Logo</a>
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
            <div class="hidden lg:flex space-x-4">
                <x-navbar.nav-link :route="route('home')">Inicio</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('gallery')">Galería </x-navbar.nav-link>
                <x-navbar.nav-link :route="route('about-us')">Acerca</x-navbar.nav-link>

                <x-navbar.nav-link :route="route('home')">Servicios</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('contacts')">Contacto</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('log-in')">Iniciar sesión</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('register')">Registrarse</x-navbar.nav-link>

            </div>
        </div>

        <!-- Menú desplegable para pantallas pequeñas -->
        <div x-show="isOpen" class="lg:hidden">
            <div class="flex flex-col space-y-4 mt-4">
                <x-navbar.nav-link :route="route('home')">Inicio</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('home')">Acerca</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('home')">Servicios</x-navbar.nav-link>
                <x-navbar.nav-link :route="route('home')">Contacto</x-navbar.nav-link>
            </div>
        </div>
    </div>
</nav>
