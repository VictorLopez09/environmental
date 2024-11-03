@php
    // Definir los colores y los íconos según el tipo de mensaje
    $bgColor = match($type) {
        'success' => 'bg-green-500', // Cambia este color si lo prefieres
        'error' => 'bg-red-500',
        'warning' => 'bg-yellow-500',
        default => 'bg-blue-500', // Color por defecto si no se pasa un tipo
    };

    $icon = match($type) {
        'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>',
        'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>',
        'warning' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h1m0 4v-4m0 6h.01m-5-5V7m0 6v6" /></svg>',
        default => '', // Sin ícono por defecto
    };
@endphp

<div x-data="{ show: true, message: '{{ $message }}' }" 
     x-show="show" 
     x-init="setTimeout(() => show = false, 5000)" 
     class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 p-4 w-full max-w-lg mx-auto"
     x-transition:enter="transition ease-out duration-300" 
     x-transition:enter-start="opacity-0 scale-90" 
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-90">
    <div class="{{ $bgColor }} text-white p-4 rounded-lg shadow-lg flex items-center justify-between">
        {!! $icon !!}
        <span class="ml-3" x-text="message"></span>
        <button @click="show = false" class="ml-4 text-white font-bold hover:text-opacity-80">
            &times;
        </button>
    </div>
</div>
