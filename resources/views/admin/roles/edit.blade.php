<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Editar roles de sistema
        </h2>
    </x-slot>
    
    @livewire('admin.role.edit-role', ['role' => $role])
    
</x-admin-layout>