<x-app-layout>

    {{-- Area de notificaciones --}}
    @livewire('notifications')
    {{-- Area de notificaciones --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-panel-user :datos-matricula="$datosMatricula" />
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