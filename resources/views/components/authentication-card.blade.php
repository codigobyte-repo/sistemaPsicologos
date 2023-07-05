<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-violet-600 to-indigo-600">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-10 py-8 bg-white shadow-md overflow-hidden sm:rounded-tl-lg sm:rounded-br-lg">
        {{ $slot }}
    </div>
</div>
