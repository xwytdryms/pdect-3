<div class="row-start-2 lg:row-start-1 bg-white dark:bg-gray-800 shadow-sm rounded-lg h-auto w-full">
    <div class="p-4 bg-white text-center rounded-lg shadow dark:bg-gray-800">
        <h5 class="mb-2 text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Arc Counter</h5>
        <div class="flex justify-center items-center">
            <h5 class="text-lg sm:text-2xl md:text-3xl font-semibold
            @if ($arccounter == 0) text-white
            @elseif ($arccounter > 0) text-red-600
            @endif">
                {{ $arccounter ?? 'N/A' }}
            </h5>
        </div>
        <p class="py-3 text-sm text-gray-500 dark:text-gray-400">Last updated {{ $time->diffForHumans() }}</p>
        <form action="{{ route('reset.arccounter') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="device_id" value="{{ $device->device_id }}">
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Reset Counter
            </button>
        </form>
        
    </div>
</div>
