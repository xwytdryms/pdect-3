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
        $uplinks = uplink::latest();


        return view('pages.monitoringpd.index', ['uplinks' => $uplinks]);
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
        $uplink->dbmin = $payload['dbmin'] ?? 0;
        $uplink->dba = $payload['dba'] ?? 0;
        $uplink->dbmax = $payload['dbmax'] ?? 0;
        $uplink->arc = $payload['arc'] ?? 0;
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

    }

    public function getData(Uplink $uplink)
    {
        $data = [
            'dbmin' => $uplink->dbmin,
            'dba' => $uplink->dba,
            'dbmax' => $uplink->dbmax,
            'arc' => $uplink->arc
        ];
    
        return response()->json($data);
    }
    

}