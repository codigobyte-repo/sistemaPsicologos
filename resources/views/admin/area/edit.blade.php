<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar área
        </h2>
    </x-slot>
    
    @livewire('admin.area.edit-area', ['area' => $area])
    
</x-admin-layout>