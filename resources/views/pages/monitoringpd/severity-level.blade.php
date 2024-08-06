<div class="col-start-3 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" id="widget" style="height: 10rem; width: 12rem;">
    <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Severity Level</h5>
        <div class="flex justify-center justify-item-center overflow-hidden" style="width: auto height: auto">
            <h5 class="my-1 text-3xl font-semibold tracking-tight 
            @if ($device->status === 'High') text-red-600
            @elseif ($device->status === 'Medium') text-yellow-500
            @elseif ($device->status === 'Low') text-green-500
            @else text-white
            @endif ">
                {{ $device->status ?? 'N/A'}}
            </h5>
        </div>
        <p class="py-3 my-1 font-normal text-sm text-gray-500 dark:text-gray-400">Last updated 2 hours ago  
        </p>
    </div>
</div>