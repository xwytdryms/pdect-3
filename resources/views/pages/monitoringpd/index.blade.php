<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Partial Discharge & Arc Monitoring') }}
        </h2>
    </x-slot>

    <div class="flex item-center justify-center h-max m-0 py-12">
        <div class="grid grid-flow-row-dense grid-cols-2 lg:grid-cols-4 gap-2 max-w-7xl px-2 lg:px-8 text-center text-gray-900 dark:text-gray-100">
            {{-- dB-Min Value --}}
            @include('pages.monitoringpd.info')
            
            {{-- dB-Max Value --}}
            @include('pages.monitoringpd.severity-level')
            
            {{-- Arc Counter --}}
            @include('pages.monitoringpd.arc')
        
            {{-- PD Graph --}}
            @include('pages.monitoringpd.graph')
        </div>
    </div>
    
    @push('scripts')
    <script>
        var dbmin = @json($dbmin);
        var dba = @json($dba);
        var dbmax = @json($dbmax);
        var arccount = @json($arccount);

        var time = @json($device->pluck('created_at'));

        var timeArray = time.map(t => {
            console.log('Original timestamp:', t); // Check the original timestamp
            let date = new Date(t); 
            console.log('Parsed Date object:', date); // Check the parsed Date object
            
            let hours = date.getHours();  
            let minutes = date.getMinutes();  
            
            return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;
        });
        

        // console check
        console.log(dbmin);
        console.log(dba);
        console.log(dbmax);
        console.log(arccount);
        console.log(timeArray);

    </script>
    <script src="{{ asset('resources/js/external/monitoringpd.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush>
</x-app-layout>
