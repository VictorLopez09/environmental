<x-layouts.app>

    @livewire('alert-component')

    @if (session('success'))
        <script>
            Livewire.emit('show', 'success', "{{ session('success') }}");
        </script>
    @endif
    <section class="bg-secondary p-10 flex-grow flex justify-center items-center">

        
        <livewire:show-form :forms="$forms" />
    </section>
    
    
</x-layouts.app>
