<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            Matriculados
        </h2>
    </x-slot>
    
    @livewire('matriculados-table')
    
</x-admin-layout>