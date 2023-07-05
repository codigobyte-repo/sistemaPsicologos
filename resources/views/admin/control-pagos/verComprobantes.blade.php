<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Comprobantes Emitidos
        </h2>
    </x-slot>
    
    @livewire('facturas-table')
    
</x-admin-layout>