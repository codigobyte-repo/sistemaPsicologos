<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar roles de sistema
        </h2>
    </x-slot>
    
    @livewire('admin.configuracion.edit-configuracion-matricula', ['configuracion' => $configuracion])
    
</x-admin-layout>