<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar datos de matriculado
        </h2>
    </x-slot>
    
    @livewire('admin.matriculado.edit-matriculado', ['matriculado' => $matriculado])
    
</x-admin-layout>