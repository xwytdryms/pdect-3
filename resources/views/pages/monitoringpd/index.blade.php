<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Partial Discharge & Arc Monitoring') }}
        </h2>
    </x-slot>

    <div class="flex justify-center m-0 py-12">
        
        <div class="grid grid-col-6 grid-rows-2 gap-4 max-w-7xl max-h-fit sm:px-6 lg:px-8 text-center text-gray-900 dark:text-gray-100">
            {{-- dB-Min Value --}}
            @include('pages.monitoringpd.info')

            {{-- PD Graph --}}
            @include('pages.monitoringpd.graph')
            
            {{-- dB-Max Value --}}
            @include('pages.monitoringpd.severity-level')
            
            {{-- Arc Counter --}}
            @include('pages.monitoringpd.arc')
            
            {{-- Arc Graph --}}
            @include('pages.monitoringpd.arc-graph')
         </div>
    </div>
    @push('scripts')
    <script src="{{ asset('resources/js/external/monitoringpd.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush>
</x-app-layout>
