<x-guest-layout>
    <div class="flex items-center justify-center h-screen bg-gray-400">
        <div class="p-4 mb-4 -mt-16 text-purple-800 border border-purple-300 rounded-lg bg-purple-50 dark:bg-gray-800 dark:text-purple-400 dark:border-purple-800">
            <div class="flex flex-col items-center px-32">
                <svg aria-hidden="true" class="w-8 h-8 mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <h3 class="text-4xl font-medium">La sesión expiró</h3>
                <div class="mt-2 mb-4 text-2xl">
                    Serás redirigido al inicio de sesión en: <span class="font-bold" id="countdown">3</span>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var countdownElement = document.getElementById('countdown');
        var countdown = parseInt(countdownElement.textContent);

        var interval = setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown === 0) {
                clearInterval(interval);
                window.location.href = '{{ route('login') }}'; // Redirige al inicio de sesión
            }
        }, 1000);
    });
</script>
