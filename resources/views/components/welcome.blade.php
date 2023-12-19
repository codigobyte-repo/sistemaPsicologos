<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        ¡Bienvenido al sistema de gestión para matriculados!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        Nuestro sistema te ofrece una variedad de características y funcionalidades 
        que te permitirán realizar tus gestiones de manera eficiente.  
        <br> Aquí tienes algunas de las cosas que podrás hacer: dar de alta matriculados, proceso de matrícula fácil,
        pagos automatizados, generar recordatorios de pagos, gestión de información, 
        <br>Estas son solo algunas de las características que nuestro sistema tiene para ofrecerte. 
        <br>Estamos comprometidos en simplificar y agilizar tu administración como personal, brindándote una experiencia fluida y eficiente.
    </p>
</div>

@can('admin.matriculados.usuarios.roles')
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>
                
                <h2 class="ml-3 text-xl font-semibold text-gray-900">
                    <a href="{{ route('admin.matriculados') }}">Matriculados</a>
                </h2>
            </div>

            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Acceda rápidamente a ver la lista de matriculados.
            </p>

            <p class="mt-4 text-sm">
                <a href="{{ route('admin.matriculados') }}" class="inline-flex items-center font-semibold text-indigo-700">
                    Explorar matriculados

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
        </div>

        <div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                
                <h2 class="ml-3 text-xl font-semibold text-gray-900">
                    <a href="{{ route('admin.users.index') }}">Usuarios</a>
                </h2>
            </div>

            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Gestione a los usuarios del sistema.
            </p>

            <p class="mt-4 text-sm">
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center font-semibold text-indigo-700">
                    Gestionar usuarios

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500">
                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </p>
        </div>
    </div>
@endcan
