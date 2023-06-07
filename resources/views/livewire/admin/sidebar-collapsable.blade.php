<div class="bg-gray-950 rounded p-3 shadow-lg absolute z-50" @mouseover="isOpen = true" @mouseleave="isOpen = false" x-data="{ isOpen: false }">

    <button class="text-gray-300 mb-4 p-2 rounded-md bg-gray-500 hover:bg-gray-600" @click="isOpen = !isOpen">
        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25" />
        </svg>
    </button>

    <ul class="space-y-2 text-sm">

        <li>
            <a href="{{ url('admin/dashboard') }}" class="flex items-center space-x-3 text-gray-300 p-2 rounded-md font-medium hover:bg-gray-600 focus:bg-gray-800 focus:shadow-outline {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                <span class="text-gray-300">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </span>
                <span x-show="isOpen">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ url('admin/matriculados') }}" class="flex items-center space-x-3 text-gray-300 p-2 rounded-md font-medium hover:bg-gray-600 focus:bg-gray-800 focus:shadow-outline {{ request()->routeIs('admin.matriculados') ? 'bg-gray-800' : '' }}">
                <span class="text-gray-300">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </span>
                <span x-show="isOpen">Matriculados</span>
            </a>
        </li>
        
        <li>
            <a href="#" class="flex items-center space-x-3 text-gray-300 p-2 rounded-md font-medium hover:bg-gray-600 focus:bg-gray-800 focus:shadow-outline">
                <span class="text-gray-300">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                </span>
                <span x-show="isOpen">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center space-x-3 text-gray-300 p-2 rounded-md font-medium hover:bg-gray-600 focus:bg-gray-800 focus:shadow-outline">
                <span class="text-gray-300">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </span>
                <span x-show="isOpen">Change password</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center space-x-3 text-gray-300 p-2 rounded-md font-medium hover:bg-gray-600 focus:bg-gray-800 focus:shadow-outline">
                <span class="text-gray-300">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </span>
                <span x-show="isOpen">Logout</span>
            </a>
        </li>
        
    </ul>
</div>