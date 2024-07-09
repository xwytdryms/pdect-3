<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $devices = Device::get();

        $kritis = Device::where('status', 'Kritis')->count();

        $jumlah = Device::get()->count();

        return view('pages.dashboard.index', ['devices' => $devices, 'kritis' => $kritis, 'jumlah' => $jumlah]);	 
    }

    public function show($device_id){
        $device = Device::where('device_id', $device_id)->with('uplink')->first();
        $arc = Uplink::where('device_id', $device_id)->latest()->value('arc');
    // dd($arc);
        if (!$device) {
            return redirect()->route('dashboard.index')->with('error', 'Device not found');
        }
    
        return view('pages.monitoringpd.index', ['device' => $device, 'arc' => $arc]);
    }
    
}
