<div class="col-span-1 lg:col-span-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-4 bg-white text-center rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
            Actions Needed on
        </h5>
        <div class="flex flex-col justify-center items-center">
            <h5 class="mb-3 mt-2 text-3xl font-semibold tracking-tight 
            @if ($high > 0)
              text-red-900 dark:text-red-500  
            @else
              text-green-700 dark:text-green-500 
            @endif
            ">
                {{ $high }}
            </h5>
            <h5 class="mb-3 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Device</h5>
        </div>
    </div>
</div>
