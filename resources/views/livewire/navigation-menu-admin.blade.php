<nav x-data="{ open: false }" class="bg-violet-500 border-violet-500 dark:bg-gray-800 border-b dark:border-gray-600">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
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

                    <div class="ml-3 mt-5 relative">
                      <div>
                        <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')" colorTexto="white" class="cursor-pointer">
                          Inicio
                        </x-nav-link>
                      </div>
                   </div>

                    {{-- @can('importMatriculados')
                        <x-nav-link href="{{ url('admin/importarExcel') }}" colorTexto="white">
                            IMPORTAR EXCEL
                        </x-nav-link>
                    @endcan --}}

                    <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false">
                      <div>
                        <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                          Administración de cobros
                          <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                          </svg>
                        </x-nav-link>
                      </div>
                      <div x-show="dropdown" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        @can('admin.configuracion-matricula')
                          <a href="{{ url('admin/configuracion-matricula') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Fechas e Importes</a>
                        @endcan

                        @can('admin.control-pagos.index')
                          <a href="{{ url('admin/control-pagos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Control de pagos</a>
                        @endcan

                        @can('admin.comprobantes')
                          <a href="{{ url('admin/comprobantes') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Comprobantes</a>
                        @endcan
                      </div>
                  </div>

                    <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false">
                        <div>
                          <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                            Matriculados & Usuarios
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                          </x-nav-link>
                        </div>
                        <div x-show="dropdown" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                          <a href="{{ url('admin/matriculados') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Matriculados</a>
                          @can('admin.matriculados.create')
                            <a href="{{ url('admin/matriculados/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo Matriculado</a>
                          @endcan
                          <div class="border-b border-gray-200"></div>
                          <a href="{{ url('admin/users') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Usuarios & Roles</a>
                          @can('admin.users.create')
                            <a href="{{ url('admin/users/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo Usuario</a>
                          @endcan
                          <div class="border-b border-gray-200"></div>
                          <a href="{{ url('admin/roles') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Roles del sistema</a>
                          @can('admin.users.create')
                            <a href="{{ url('admin/roles/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo Rol</a>
                          @endcan
                        </div>
                    </div>

                    <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false">
                        <div>
                          <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                            Configuraciones
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                          </x-nav-link>
                        </div>
                        <div x-show="dropdown" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                          <a href="{{ url('admin/universidades') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Universidades</a>
                          @can('admin.universidades.create')
                            <a href="{{ url('admin/universidades/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Universidad</a>
                          @endcan

                          <div class="border-b border-gray-200"></div>

                          <a href="{{ url('admin/localidades') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Localidades</a>
                          @can('admin.localidades.create')
                            <a href="{{ url('admin/localidades/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Localidad</a>
                          @endcan
                          
                          <div class="border-b border-gray-200"></div>
                          
                          <a href="{{ url('admin/areas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Municipios</a>
                          @can('admin.areas.create')
                            <a href="{{ url('admin/areas/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo Municipio</a>
                          @endcan

                          <div class="border-b border-gray-200"></div>

                          <a href="{{ url('admin/revistas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Situacion Revistas</a>
                          @can('admin.revistas.create')
                            <a href="{{ url('admin/revistas/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Situación</a>
                          @endcan 

                          <div class="border-b border-gray-200"></div>
                          
                          <a href="{{ url('admin/revistas-motivos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Situación revistas motivos</a>
                          @can('admin.revistas-motivos.create')
                            <a href="{{ url('admin/revistas-motivos/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo motivo</a>
                          @endcan 
                        </div>
                    </div>

                    <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false">
                      <div>
                        <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                         Notificaciones
                          <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                          </svg>
                        </x-nav-link>
                      </div>
                      <div x-show="dropdown" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{ url('admin/messages') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Notificaciones</a>
                      </div>
                  </div>

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                {{-- MODO DARK --}}
                <div class="mr-2">
                    <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                        x-on:click="darkMode = !darkMode"
                        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        role="switch" aria-checked="false">
                        <span class="sr-only">Modo Oscuro</span>
                        <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                            class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full shadow ring-0 transition duration-200 ease-in-out">
                            <span
                                x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                </svg>
                            </span>
                            <span
                                x-bind:class="darkMode ?  'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    </button>
                </div>

                <!-- DROPDOWN USUARIO Y CERRAR SESION -->
                <div class="ml-3 relative">
                    <x-dropdown align="right">

                        <x-slot name="trigger">
                            <span class="inline-flex rounded-full bg-purple-500 dark:bg-gray-500 ">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user()->profile_photo_path)
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @else
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white hover:bg-gray-400 focus:outline-none focus:bg-gray-400 active:bg-gray-400 transition ease-in-out duration-150">
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
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="ml-4">
            <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                x-on:click="darkMode = !darkMode"
                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                role="switch" aria-checked="false">
                <span class="sr-only">Modo Oscuro</span>
                <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                    class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full shadow ring-0 transition duration-200 ease-in-out">
                    <span
                        x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                        aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </span>
                    <span
                        x-bind:class="darkMode ?  'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                        class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                        aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
            </button>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <div class="ml-3 mt-5 relative">
                <x-nav-link colorTexto="white" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Inicio
                </x-nav-link>
            </div>

            <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }">
                <div>
                  <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                    Matriculados
                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </x-nav-link>
                </div>
                <div x-show="dropdown" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="{{ url('admin/matriculados') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Matriculados</a>
                  @can('admin.matriculados.create')
                    <a href="{{ url('admin/matriculados/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo Matriculado</a>
                  @endcan
                </div>
            </div>

            <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }">
                <div>
                  <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                    Administración de cobros
                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </x-nav-link>
                </div>
                <div x-show="dropdown" x-on:mouseover="dropdown = true" x-on:mouseleave="dropdown = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  @can('admin.configuracion-matricula')
                    <a href="{{ url('admin/configuracion-matricula') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Fechas e Importes</a>
                  @endcan

                  @can('admin.control-pagos.index')
                    <a href="{{ url('admin/control-pagos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Control de pagos</a>
                  @endcan

                  @can('admin.comprobantes')
                    <a href="{{ url('admin/comprobantes') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Comprobantes</a>
                  @endcan
                </div>
            </div>

            <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }">
                <div>
                  <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                    Universidades
                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </x-nav-link>
                </div>
                <div x-show="dropdown" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="{{ url('admin/universidades') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Universidades</a>
                  @can('admin.universidades.create')
                    <a href="{{ url('admin/universidades/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Universidad</a>
                  @endcan
                </div>
            </div>

            <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }">
                <div>
                  <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                    Localidades & Municipios
                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </x-nav-link>
                </div>
                <div x-show="dropdown" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="{{ url('admin/localidades') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Localidades</a>
                  @can('admin.localidades.create')
                    <a href="{{ url('admin/localidades/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Localidad</a>
                  @endcan
                  <div class="border-b border-gray-200"></div>
                  <a href="{{ url('admin/areas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Municipios</a>
                  @can('admin.areas.create')
                    <a href="{{ url('admin/areas/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo Municipio</a>
                  @endcan
                </div>
            </div>

            <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }">
                <div>
                  <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                    Situación Revistas & Motivos
                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </x-nav-link>
                </div>
                <div x-show="dropdown" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="{{ url('admin/revistas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Situacion Revistas</a>
                  @can('admin.revistas.create')
                    <a href="{{ url('admin/revistas/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Situación</a>
                  @endcan 
                  <div class="border-b border-gray-200"></div>
                  <a href="{{ url('admin/revistas-motivos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Situación revistas motivos</a>
                  @can('admin.revistas-motivos.create')
                    <a href="{{ url('admin/revistas-motivos/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nuevo motivo</a>
                  @endcan 
                </div>
            </div>

            <div class="ml-3 mt-5 relative" x-data="{ dropdown: false }">
              <div>
                <x-nav-link x-on:click="dropdown = !dropdown" colorTexto="white" class="cursor-pointer">
                  Mensajes y notificaciones
                  <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                </x-nav-link>
              </div>
              <div x-show="dropdown" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                
                <a href="{{ url('admin/messages/index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-0">Notificaciones</a>
                <a href="{{ url('admin/revistas/create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-white hover:bg-violet-600 dark:hover:bg-gray-600 dark:focus:bg-gray-800 focus:shadow-outline" role="menuitem" tabindex="-1" id="user-menu-item-1">Nueva Situación</a>
              </div>
          </div>

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
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
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
