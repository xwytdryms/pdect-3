<div class="row-start-2 lg:row-start-1 bg-white dark:bg-gray-800 shadow-sm rounded-lg h-auto w-full">
    <div class="p-4 bg-white text-center rounded-lg shadow dark:bg-gray-800">
        <h5 class="mb-2 text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Arc Counter</h5>
        <div class="flex justify-center items-center">
            <h5 class="text-lg sm:text-2xl md:text-3xl font-semibold
            @if ($arc == 0) text-white
            @elseif ($arc > 0) text-red-600
            @endif">
                {{ $arc ?? 'N/A'}}
            </h5>
        </div>
        <p class="py-3 text-sm text-gray-500 dark:text-gray-400">Last updated {{ $device->created_at->diffForHumans() }}</p>
    </div>
</div>
