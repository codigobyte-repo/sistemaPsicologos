<div class="relative inline-flex items-center px-6 mr-2 text-sm font-medium text-center">
    <x-dropdown class="w-96">
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                
                <x-nav-link wire:click="resetNotificationCount()" colorTexto="graySinBorder" class="relative inline-flex items-center px-5 mr-2 mt-2">
                    <svg class="w-5 h-5 mr-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                    
                    <span class="sr-only">Notificaciones</span>
                    Notificaciones
                    {{-- @if(auth()->user()->notification) --}}
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                            {{ auth()->user()->notification }}
                        </div>
                    {{-- @endif --}}
                </x-nav-link>

            </span>
        </x-slot>

        <ul>
            @foreach ($notifications as $notification)
                <li wire:click="read('{{ $notification->id }}')" class="{{ !$notification->read_at ? 'bg-gray-200' : '' }}">
                    <x-dropdown.header label="Mensajes recibidos">
                        <x-dropdown.item
                            href="{{ $notification->data['url'] }}"
                            label="{{ $notification->data['message'] }} "
                            icon="annotation"
                            >
                        </x-dropdown.item>
                        <span class="text-xs font-bold text-gray-400 ml-4 mb-4">{{ $notification->created_at->diffForHumans() }}</span>
                        @if (!$loop->last)
                            <hr class="border-t border-gray-300 my-2">
                        @endif
                    </x-dropdown.header>
                </li>

            @endforeach
        </ul>
    </x-dropdown>
</div>
