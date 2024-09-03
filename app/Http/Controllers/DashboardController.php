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

        $high = Device::where('status', 'High')->count();

        $jumlah = Device::get()->count();

        return view('pages.dashboard.index', ['devices' => $devices, 'high' => $high, 'jumlah' => $jumlah]);	 
    }

    
}
