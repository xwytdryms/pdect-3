<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use Termwind\Components\Dd;

class DeviceController extends Controller
{
    

    public function index()
    {
        // Fetch latest devices data
        $devices = Device::latest()->get();

        // Extract payloads
        $deviceData = $devices->map(function($device){

            return [
                'id'=> $device->id,
                'device_id' => $device->device_id,
                'device_name' => $device->name,
                'device_eui' => $device->device_eui,
                'description' => $device->description,
                'address' => $device->address,
                'latitude' => $device->latitude,
                'longitude' => $device->longitude 
            ];

        });
        

        return view('pages.devicemanager.index',['device'=>$deviceData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceRequest $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'device_id' => 'required|max:255',
            'device_eui' => 'required|max:255',
            'device_class' => 'nullable|max:255',   
            'description' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);
        

        Device::create($request->all());

        return redirect()->route('devicemanager')
            ->with('success', 'Device created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        // $id = $device->device_id;
        
        // return view('pages.monitoringpd.info', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return view('components.edit-device-form');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Device $device, Request $request): RedirectResponse
    {   
        $request->validate([
            'name'  => 'nullable|max:255',
            'device_eui' => 'nullable|max:255',
            'description' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        // $oldStatus = $device->status;
        $device = $request->device();
        
        $device->update($request->all());


        return Redirect::route('devicemanager')
        ->with('success', 'Device updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $device = $request->device();

        $device->delete();
        return Redirect::route('devicemanager')->with('status', 'device-deleted');
    }
}