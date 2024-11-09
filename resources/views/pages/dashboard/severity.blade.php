<div class="col-start-4 col-span-2 row-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 28rem; height: auto;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <a href="{{ route('dashboard', ['sort' => 'id', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">#</a>
                </th>
                <th scope="col" class="px-6 py-3">
                    <a href="{{ route('dashboard', ['sort' => 'name', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">PLN Area</a>
                </th>
                <th scope="col" class="px-6 py-3">
                    <a href="{{ route('dashboard') }}?sort=device_id&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">
                        Device Id
                    </a>
                </th>                
                <th scope="col" class="px-6 py-3">
                    <a href="{{ route('dashboard') }}?sort=status&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">
                        Severity
                    </a>
                </th>
                
                
            </tr>
        </thead>
        
        <tbody>
            @foreach ($devices as $device)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $device->id }}
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('dashboard.show', $device->device_id) }}" class="hover:underline">{{ $device->name ?? $device->device_id }}</a>
                </td>
                <td class="px-6 py-4">
                    {{ $device->device_id }}
                </td>
                <td class="px-6 py-4 
                    @if ($device->status === 'High') text-red-500
                    @elseif ($device->status === 'Medium') text-yellow-500
                    @elseif ($device->status === 'Low') text-green-500
                    @else text-white
                    @endif">
                    {{ $device->status ?? 'N/A' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination Links -->
    <div class="px-6 py-3">
        {{ $devices->links() }}
    </div>
    
    
</div>