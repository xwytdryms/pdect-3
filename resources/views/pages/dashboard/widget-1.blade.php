<div class="col-span-1 lg:col-span-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-4 bg-white text-center rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
            Device Installed
        </h5>
        <div class="flex flex-col justify-center items-center">
            <h5 class="mb-3 mt-2 text-3xl font-semibold tracking-tight text-green-500 dark:text-green-200">
                {{ $jumlah }}
            </h5>
            <h5 class="mb-3 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Device</h5>
        </div>
        <a href="{{ route('devicemanager') }}" class="inline-flex items-center text-blue-600 hover:underline">
            Add Device
            <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>
</div>
