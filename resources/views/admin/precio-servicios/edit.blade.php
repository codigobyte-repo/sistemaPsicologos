<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Modificar precios
        </h2>
    </x-slot>
    
    @livewire('admin.precio-servicios.modificar-precios', ['precio' => $precio])
    
</x-admin-layout>