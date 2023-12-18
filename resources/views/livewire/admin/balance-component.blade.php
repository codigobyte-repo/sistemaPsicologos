<div>
    {{-- <section class="my-4 mx-auto text-center text-gray-700 font-semibold">
        Saldo total "En proceso" = 
        <span class="font-bold text-blue-600"> 
            $ {{ number_format($balancePorEstado['en_proceso'], 2, ',', '.') }}.-
        </span>
        Saldo total "Aprobados" = 
        <span class="font-bold text-blue-600"> 
            $ {{ number_format($balancePorEstado['aprobado'], 2, ',', '.') }}.-
        </span>
        Saldo total "Rechazados" = 
        <span class="font-bold text-blue-600"> 
            $ {{ number_format($balancePorEstado['rechazado'], 2, ',', '.') }}.-
        </span>
    </section> --}}

    <section class="my-2 mx-auto text-center text-gray-700 dark:text-white font-semibold px-8">
        Pagos, en proceso:
        <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">
            {{ $en_proceso }}
        </span>
        Pagos, aprobados:
        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
            {{ $aprobados }}
        </span>
        Pagos, rechazados:
        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
            {{ $rechazados }}
        </span>
    </section>
</div>
