<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar datos de la situación revistas
        </h2>
    </x-slot>
    
    @livewire('admin.situacion.edit-situacion-revista', ['revista' => $revista])
    
</x-admin-layout>