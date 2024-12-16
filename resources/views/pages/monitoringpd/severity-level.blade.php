<div class="row-start-2 lg:row-start-1 bg-white dark:bg-gray-800 shadow-sm rounded-lg h-auto w-full">
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
        <h5 class="mb-2 text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Severity Level</h5>
        <div class="flex justify-center items-center">
            <h5 class="text-lg sm:text-2xl md:text-3xl font-semibold
            @if ($device->status === 'High') text-red-600
            @elseif ($device->status === 'Medium') text-yellow-500
            @elseif ($device->status === 'Low') text-green-500
            @else text-white
            @endif">
                {{ $device->status ?? 'N/A'}}
            </h5>
        </div>
        <p class="py-3 text-sm text-gray-500 dark:text-gray-400">Last updated {{ $device->created_at->diffForHumans() }}</p>
    </div>
</div>
