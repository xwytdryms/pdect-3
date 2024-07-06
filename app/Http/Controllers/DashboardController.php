<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $device = Device::get();

        $status = json_decode($device->uplink->last()->payloads);

        // dd($status->toArray());
        // dd($status->toArray());

        return view('pages.dashboard.index', ['device' => $device, 'status' => $status]);	 
    }


}
