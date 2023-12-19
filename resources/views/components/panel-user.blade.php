<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        ¡Bienvenido al sistema de gestión para matriculados!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        Nuestro sistema te ofrece una variedad de características y funcionalidades 
        que te permitirán controlar tus trámites de manera eficiente.  
        <br> Aquí tienes algunas de las cosas que podrás hacer: proceso de matrícula fácil,
        anuncios de pagos, recordatorios de pagos, ver sus datos, etc.
        <br>Estas son solo algunas de las características que nuestro sistema tiene para ofrecerte. 
        <br>Estamos comprometidos en simplificar y agilizar tus trámites como matriculado, brindándote una experiencia fluida y eficiente.
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="max-w-sm p-6 mx-auto bg-white border-l-4 border-purple-500 shadow dark:bg-gray-800 dark:border-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>              
            
            <h5 class="mb-2 pt-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PAGOS PENDIENTES</h5>
            
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Anunciá desde aquí los servicios que abonaste para que tu pago surja efecto en nuestros sistemas. <br> 
            </p>
            @if($isUserMatriculado)
                <a href="{{ route('anuncio-pagos') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Anunciar
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            @endif
        </div>
    </div>

    <div>
        <div class="max-w-sm p-6 mx-auto bg-white border-l-4 border-purple-500 shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Verificá aquí tus anuncios de pagos</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">En esta sección podrás acceder a ver tus anuncios de pagos</p>
            @if($isUserMatriculado)
                <a href="{{ route('mis-comprobantes') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ver más
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            @endif
        </div>
    </div>
</div>
