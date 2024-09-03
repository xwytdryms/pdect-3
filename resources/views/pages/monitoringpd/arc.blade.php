<div class="col-start-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" id="widget" style="height: 10rem; width: 12rem;">
    <div class="p-4 bg-white text-canter rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Arc Counter :</h5>
        <div class="flex justify-center justify-item-center my-2 overflow-hidden text center">
            <h5 class="my-1 text-3xl font-semibold tracking-tight 
            @if ($arc == 0) 
                text-white
            @elseif ($arc > 0)
                text-red-600
            @endif">
            {{ $arc ?? 'N/A'}}
            </h5>
        </div>
        <p class="py-2 my-1 font-normal text-sm text-gray-500 dark:text-gray-400">Last updated {{ $device->created_at->diffForHumans() }}
        </p>
    </div>
</div>