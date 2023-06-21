<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar datos de universidad
        </h2>
    </x-slot>
    
    @livewire('admin.university.edit-university', ['university' => $university])
    
</x-admin-layout>