<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar datos de situación revista motivos
        </h2>
    </x-slot>
    
    @livewire('admin.motivo.edit-situacion-revista-motivo', ['motivo' => $motivo])
    
</x-admin-layout>