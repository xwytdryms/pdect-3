<?php

namespace App\Http\Controllers;

use App\Http\Resources\UplinkResource;
use App\Mappers\ChirpstackUplinkMapper;
use App\Mappers\UplinkMapperInterface;
use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class UplinkController extends Controller
{
    public function index()
    {
        // Fetch the latest uplink data
        $uplink = Uplink::latest()->first();

        // Extract payloads
        if ($uplink) {
            $payloads = $uplink->latestPayload();
            $uplinkData = [
                'id' => $uplink->id,
                'port' => $uplink->port,
                'device_id' => $uplink->device_id,
                'dBMin' => $payloads['dBMin'] ?? 'N/A',
                'dBA' => $payloads['dBA'] ?? 'N/A',
                'dBMax' => $payloads['dBMax'] ?? 'N/A',
                'Arc' => $payloads['Arc'] ?? 'N/A',
                'status' => $payloads['status'][0] ?? 'N/A',
            ];
        } else {
            $uplinkData = null;
        }

        // Pass the data to the view
        return view('pages.monitoringpd.index', ['uplink' => $uplinkData]);
    }


    public function chirpstack(Request $request)
    {
        if ($request->query('event') == 'up') {
            $mapper = new ChirpstackUplinkMapper($request->all());

            return $this->storeUplink($mapper);
        }
        return response(null, 204);
    }

    private function storeUplink(UplinkMapperInterface $mapper)
    {
        $data = [
            'device_id' => $mapper->getDeviceId(),
            'date' => $mapper->getTime()->toDateTimeString(),
            'port' => $mapper->getPort(),
        ];

        // payload
        $payload = $mapper->getPayload();
        $uplink = Uplink::create($data, [
            'payloads' => [],
        ]);
        $uplink->payloads = $payload;
        $uplink->dB_Max = $payload['dBMin'] ?? 0;
        $uplink->dB_Max = $payload['dBA'] ?? 0;
        $uplink->dB_Max = $payload['dBMax'] ?? 0;
        $uplink->dB_Max = $payload['Arc'] ?? 0;
        $uplink->save();

        // device
        $device = Device::firstOrCreate([
            'device_eui' => $mapper->getEui(),
        ], [
            'device_id' => $mapper->getDeviceId(),
            'name' => null,
            'timezone' => 'Asia/Jakarta',
            'status' => 'active',
            'device_class' => null,
            'device_normal_interval' => null,
            'device_alert_interval' => null,
            'latest_payload' => [],
            'latest_payload_at' => null
        ]);

        // save payload to device
        $device->latest_payload = $payload;
        $device->status = $device->latest_payload['status'];
        $device->latest_payload_at = $uplink->created_at;
        $device->save();



        // // Status change from port
        // if ($data['port'] == 3) {
        //     $status = 'onrepair';
        // } else if ($data['port'] == 2) {
        //     $status = 'danger';
        // } else if ($data['port'] == 1) {
        //     $status = 'active';
        // }
        // if (isset($status)) {
        //     if ($device->status != $status) {
        //         event(new \App\Events\DeviceStatusChanged($device, $status));
        //     }
        //     $device->status = $status;
        //     $device->save();
        // }

        // // handle downlink confirmation
        // // port 100 = confirmation for device class
        // // port 101 = confirmation for device normal interval
        // // port 102 = confirmation for device alert interval
        // // port 103 = debugging message port
        // // port 104 = confirmation message port
        // if ($data['port'] == 100) {
        //     $device->device_class = $payload['device_class'];
        //     $device->downlink()->status = 'confirmed';
        //     $device->save();
        // } else if ($data['port'] == 101) {
        //     $device->device_normal_interval = $payload['device_normal_interval'];
        //     $device->downlink()->status = 'confirmed';
        //     $device->save();
        // } else if ($data['port'] == 102) {
        //     $device->device_alert_interval = $payload['device_alert_interval'];
        //     $device->downlink()->status = 'confirmed';
        //     $device->save();
        // } else if ($data['port'] == 103) {
        //     $device->debugging_message = $payload;
        //     $device->downlink()->status = 'confirmed';
        //     $device->save();
        // } else if ($data['port'] == 104) {
        //     $device->response_message = $payload['response_message'];
        //     $device->downlink()->status = 'confirmed';
        //     $device->save();
        // }

        // // if (isset($payload['status'])) {
        // //     if ($device->status != $payload['status']) {
        // //         event(new \App\Events\DeviceStatusChanged($device, $payload['status']));
        // //     }
        // //     $device->status = $payload['status'];
        // // }

        // event(new \App\Events\UplinkReceived($device, $mapper));

        // return response()->noContent();
    }


}