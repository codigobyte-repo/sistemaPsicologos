<x-app-layout>

    {{-- Area de notificaciones --}}
    @livewire('notifications')
    {{-- Area de notificaciones --}}

    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 20000)" x-show="show"  id="sticky-banner" tabindex="-1" class="left-0 z-50 flex justify-between w-full p-4 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="flex items-center mx-auto">
                <p class="flex items-center text-sm font-normal text-green-500 dark:text-gray-400">
                    <span class="inline-flex p-1 mr-3 bg-green-200 rounded-full dark:bg-gray-600">
                        <svg class="w-4 h-4 text-green-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path>
                        </svg>
                        <span class="sr-only">Light bulb</span>
                    </span>
                    <span>{{ session('message') }}</span>
                </p>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- resources/views/components/panel-user.blade.php --}}
                <x-panel-user :isUserMatriculado="$isUserMatriculado"/>

            </div>
        </div>
    </div>
    
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/marcar-como-visto');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhr.send();
    });
</script>