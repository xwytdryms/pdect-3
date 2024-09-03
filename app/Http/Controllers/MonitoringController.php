<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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


        

//   dd($arccounter);
        if (!$device) {
            return redirect()->route('dashboard.index')->with('error', 'Device not found');
        }
    
        return view('pages.monitoringpd.index', ['device' => $device, 'arc' => $arc, 'dbmin' => $dbmin, 'dba' => $dba, 'dbmax' => $dbmax, 
        'arccount' => $arccount, 'arccounter' => $arccounter, 'highestArc' => $highestArc]);
    }
}
