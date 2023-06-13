<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Matriculados
        </h2>
    </x-slot>
    
    @livewire('form-matriculado', ['user' => $user])
    
</x-admin-layout>