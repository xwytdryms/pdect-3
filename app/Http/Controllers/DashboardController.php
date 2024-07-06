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

        // dd($status->toArray());
        // dd($status->toArray());

        return view('pages.dashboard.index', ['devices' => $devices]);	 
    }


}
