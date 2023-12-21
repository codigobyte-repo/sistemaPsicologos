<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema administrativo de Psicología</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" href="{{asset('assets/images/logo-icon-16x16.png')}}" type="image/x-icon">

        {{-- WIEREUI --}}
        {{-- @wireUiScripts --}}
        <wireui:scripts />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Hoja de estilos personaliza --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/estilos.css') }}">

        @stack('css')

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" x-data="{ darkMode: false }" x-init="
        if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
        }
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>
            <div x-bind:class="{'dark' : darkMode === true}">

        <x-banner />

        <x-notifications />
        
        <div class="min-h-screen bg-white dark:bg-gray-950">

            @livewire('navigation-menu-admin')
            
            <div class="flex bg-white" x-data="{ isOpen: false }">
                
                <div class="hidden md:block w-16 bg-white dark:bg-gray-950 p-1 transition-all ease-in-out duration-500 relative" :class="{ 'w-16': !isOpen }">
                    @livewire('admin.sidebar-collapsable')
                </div>
                

                <div class="flex-1 dark:bg-gray-950 p-1 transition-all ease-in-out duration-500" style="width: calc(100% - 4rem);">

                    @if (isset($header))
                        <header class="bg-gray-100 dark:bg-gray-800 rounded shadow mb-1">
                            <div class="w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <div class="p-4 bg-white dark:bg-gray-600 rounded">
                        {{$slot}}
                    </div>
                </div>
            </div>

        </div>

        @stack('modals')

        @livewireScripts

        @stack('js')

    </body>
</html>
