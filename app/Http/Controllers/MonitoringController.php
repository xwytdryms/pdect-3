<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class MonitoringController extends Controller
{
    public function show($device_id){
        $device = Device::where('device_id', $device_id)->with('uplink')->first();
        $arc = Uplink::where('device_id', $device_id)->latest()->value('arc');     
        $dbmin = Uplink::where('device_id', $device_id)->pluck('dbmin');
        $dba = Uplink::where('device_id', $device_id)->pluck('dba');
        $dbmax = Uplink::where('device_id', $device_id)->pluck('dbmax');
        $arccount = Uplink::where('device_id', $device_id)->pluck('arc');
        $arccounter = Uplink::where('device_id', $device_id)->where('arc', '>=', 1)->count();
        $highestArc = Uplink::where('device_id', $device_id)->max('arc');
        $timestamp = Uplink::where('device_id', $device_id)->pluck('created_at');
        $time = Uplink::where('device_id', $device_id)->latest()->value('created_at');


//   dd($arccounter);
        if (!$device) {
            return redirect()->route('dashboard.index')->with('error', 'Device not found');
        }
    
        return view('pages.monitoringpd.index', ['device' => $device, 'arc' => $arc, 'dbmin' => $dbmin, 'dba' => $dba, 'dbmax' => $dbmax, 
        'arccount' => $arccount, 'arccounter' => $arccounter, 'highestArc' => $highestArc, 'time' => $time, 'timestamp' => $timestamp]);
    }

    public function resetArcCounter(Request $request)
    {
        // Ensure the request contains 'device_id'
        $deviceId = $request->input('device_id');
        if (!$deviceId) {
            return redirect()->back()->with('error', 'Device ID is required.');
        }
    
        // Fetch the device or return error if not found
        $device = Device::where('device_id', $deviceId)->first();
    
        if (!$device) {
            return redirect()->back()->with('error', 'Device not found.');
        }
    
        // Reset the arc counter
        Uplink::where('device_id', $deviceId)->update(['arc' => 0]);
    
        // Redirect back with a success message
        return redirect()->back()->with('status', 'Arc counter has been reset successfully.');
    }
    

}
