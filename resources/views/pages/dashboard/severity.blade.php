<div class="col-span-1 lg:col-span-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-i bg-white text-center rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('dashboard') }}?sort=status&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">
                            No
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('dashboard', ['sort' => 'name', 'direction' => $direction === 'asc' ? 'desc' : 'asc']) }}">Device Name</a>
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
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600
                {{-- @if ($critical === 0)
                    
                @else
                    bg-red-700
                @endif --}}
                ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $device->row_number }}
                    </th>
                    <td class="px-6 py-4 bg">
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
    </div>
</div>
