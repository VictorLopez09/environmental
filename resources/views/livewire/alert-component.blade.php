<div 
    x-data="{ open: @entangle('visible') }" 
    x-show="open" 
    x-init="setTimeout(() => open = false, 5000)"  
    class="fixed top-5 right-5 p-4 rounded-md shadow-lg z-50"
    :class="{
        'bg-green-100 border-l-4 border-green-500 text-green-700': '{{ $type }}' === 'success',
        'bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700': '{{ $type }}' === 'warning',
        'bg-red-100 border-l-4 border-red-500 text-red-700': '{{ $type }}' === 'error',
    }"
    role="alert"
>
    <div class="flex justify-between items-center">
        <div>
            <p class="font-bold">{{ ucfirst($type) }}</p>
            <p>{{ $message }}</p>
        </div>
        <button @click="open = false" class="font-bold ml-4 text-inherit hover:text-opacity-80">
            &times;
        </button>
    </div>
</div>

