<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link colorTexto="gray" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @can('admin.dashboard')
                        <x-nav-link colorTexto="gray" href="{{ url('admin/dashboard') }}" :active="request()->routeIs('dashboard')">
                            Administrador
                        </x-nav-link>
                    @endcan

                    <x-nav-link colorTexto="gray" href="{{ route('mis-comprobantes') }}" :active="request()->routeIs('mis-comprobantes')">
                        Mis pagos
                    </x-nav-link>

                    <x-nav-link colorTexto="gray" href="{{ route('mis-datos') }}" :active="request()->routeIs('mis-datos')">
                        Mis datos
                    </x-nav-link>

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    
                    <x-nav-link colorTexto="graySinBorder" class="relative inline-flex items-center px-5 mr-12 text-sm font-medium text-center" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <svg class="w-5 h-5 mr-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        
                        <span class="sr-only">Notificaciones</span>
                        Notificaciones
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                            0
                        </div>
                    </x-nav-link>

                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-full bg-purple-500">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user()->profile_photo_path)
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @else
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-600 active:bg-gray-600 transition ease-in-out duration-150">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) . strtoupper(substr(Auth::user()->lastname, 0, 1)) }}
                        
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                @endif
                            </span>
                        </x-slot>

                        <x-dropdown.header label="ADMINISTRAR CUENTA">
                            <x-dropdown.item href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown.item>

                            @can('admin.dashboard')
                                <x-dropdown.item href="{{ url('admin/dashboard') }}">
                                    Administrador
                                </x-dropdown.item>
                            @endcan

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown.item href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown.item>
                            </form>
                        </x-dropdown.header>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

{{-- Funcionalidad para que sólo se vea en la vista dashboard --}}
{{-- Obtenemos la ruta actual y si es igual a dashboard mostramos el menú --}}
@php
    $dashboardUrl = route('dashboard');
    $currentUrl = Request::url();
@endphp

@if ($currentUrl == $dashboardUrl)

    {{-- Funcionalidad para que no se vea en la vista admin --}}
    @cannot('admin.dashboard')

        <div class="left-0 z-50 w-full h-32 bg-black border-t-2 border-b-8 border-purple-500 dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-4xl grid-cols-4 mx-auto font-medium gap-x-4">
                <a href="{{ route('dashboard') }}" class="inline-flex flex-col items-center justify-center px-5 group">
                    <svg class="w-6 h-6 mb-1 text-white group-hover:text-purple-600 dark:group-hover:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    <span class="text-sm md:text-lg text-white group-hover:text-purple-600 dark:group-hover:text-blue-500">Inicio</span>
                </a>
                <a href="{{ route('cuentas') }}" class="inline-flex flex-col items-center justify-center px-5 group">
                    <svg class="w-6 h-6 mb-1 text-white group-hover:text-purple-600 dark:group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>              
                    <span class="text-sm md:text-lg text-white group-hover:text-purple-600 dark:group-hover:text-blue-500">Estado de cuenta</span>
                </a>
                <a href="{{ route('mis-comprobantes') }}" class="inline-flex flex-col items-center justify-center px-5 group">
                    <svg class="w-6 h-6 mb-1 text-white group-hover:text-purple-600 dark:group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                    </svg>                      
                    <span class="text-sm md:text-lg text-white group-hover:text-purple-600 dark:group-hover:text-blue-500">Constancias</span>
                </a>
                <a href="{{ route('profile.show') }}" class="inline-flex flex-col items-center justify-center px-5 group">
                    <svg class="w-6 h-6 mb-1 text-white group-hover:text-purple-600 dark:group-hover:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"></path>
                    </svg>
                    <span class="text-sm md:text-lg text-white group-hover:text-purple-600 dark:group-hover:text-blue-500">Perfil</span>
                </a>
            </div>
        </div>

    @endcannot

@endif

