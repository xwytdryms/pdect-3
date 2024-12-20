<x-app-layout>
    @push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center m-0 py-12">
        <div class="flex grid auto-rows-auto grid-cols-1 lg:grid-cols-5 gap-2 max-w-7xl sm:px-6 lg:px-8 text-center text-gray-900 dark:text-gray-100">
            <!-- Map Section -->
            <div class="col-span-1 lg:col-span-3 lg:row-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('pages.dashboard.map')
            </div>

            <!-- Widgets Section -->
            <div class="col-span-1 lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-2 overflow-hidden shadow-sm sm:rounded-lg lg:max-h-48">
                @include('pages.dashboard.widget-1')
                @include('pages.dashboard.widget-2')
            </div>

            <!-- Severity Section -->
            <div class="col-span-1 lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg lg:min-h-72">
                @include('pages.dashboard.severity')
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        var devices = @json($devices->items());
        const deviceRoute = '{{ route('dashboard.show', ':id') }}';
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('resources/js/external/dashboard.js') }}"></script>
    @endpush
</x-app-layout>
