@php
    // Definir los colores según el tipo de mensaje
    $bgColor = match($type) {
        'success' => 'bg-green-500', // Cambia este color si lo prefieres
        'error' => 'bg-red-500',
        'warning' => 'bg-yellow-500',
        default => 'bg-blue-500', // Color por defecto si no se pasa un tipo
    };
@endphp

<div x-data="{ show: false, message: '{{ $message }}' }" 
     x-show="show" 
     x-init="show = true; setTimeout(() => show = false, 5000);"
     class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50"
     style="display: none;">
    <div class="{{ $bgColor }} text-white p-4 rounded-lg shadow-lg">
        <span x-text="message"></span>
    </div>
</div>
