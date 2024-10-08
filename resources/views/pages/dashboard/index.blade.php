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
        <div class="grid grid-col-5 grid-rows-3 gap-4  max-w-7xl sm:px-6 lg:px-8 text-center text-gray-900 dark:text-gray-100">
            {{-- Buat Pin Map Tiap Alat --}}
            @include('pages.dashboard.map')

            {{-- Widget buat device --}}
            @include('pages.dashboard.widget-1')

            {{-- 2nd wideget buat device  --}}
            @include('pages.dashboard.widget-2')

            {{-- Buat Kondisi Low, Medium, & High --}}
            @include('pages.dashboard.severity')

        </div>
    </div>
    @push('scripts')
    <script>
        // add devices to js
        var devices = @json($devices);
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script src="{{ asset('resources/js/external/dashboard.js') }}"></script>
    @endpush
</x-app-layout>
