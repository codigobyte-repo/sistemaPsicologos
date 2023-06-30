<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-300 leading-tight">
            Detalle de pago
        </h2>
    </x-slot>
    
    @livewire('admin.control-pagos.detalle-pago', ['pago' => $pago])
    
</x-admin-layout>