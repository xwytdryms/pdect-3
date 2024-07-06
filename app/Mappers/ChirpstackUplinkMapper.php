<?php

namespace App\Mappers;

use App\Models\Device;
use Carbon\Carbon;

class ChirpstackUplinkMapper implements UplinkMapperInterface
{
    public $uplink;

    public function __construct(array $uplink)
    {
        $this->uplink = $uplink;
    }

    protected function getDeviceTimezone()
    {
        $deviceId = $this->getDeviceId();
        return optional(Device::where('device_id', $deviceId)->first())->timezone;
    }

    public function getDeviceId()
    {
        return $this->uplink['deviceName'];
    }

    public function getPort()
    {
        return $this->uplink['fPort'];
    }

    public function getTime()
    {
        $time = new Carbon(optional($this->uplink['rxInfo'][0])['time']);

        if ($timezone = $this->getDeviceTimezone()) {
            $time->setTimezone($timezone);
        }

        return $time;
    }

    public function getRssi()
    {
        $collection = collect($this->uplink['rxInfo']);
        $rssi = $collection->pluck('rssi')->max();
        return $rssi;
    }

    public function getSnr()
    {
        $collection = collect($this->uplink['rxInfo']);
        return $collection->pluck('loRaSNR')->max();
    }

    public function getCounter()
    {
        return $this->uplink['fCnt'];
    }

    public function getFrequency()
    {
        return $this->uplink['txInfo']['frequency'] / 1000000;
    }


    public function getPayload()
    {
        $payload = json_decode($this->uplink['objectJSON'], true);
        $payload['frequency'] = $this->getFrequency();
        // $payload['time'] = $this->getTime()->toTimeString();
        $payload['datetime'] = $this->getTime()->toAtomString();
        $payload['rssi'] = $this->getRssi();
        $payload['snr'] = $this->getSnr();
        $payload['counter'] = $this->getCounter();

        return $payload;
    }

    public function getEui()
    {
        return bin2hex(base64_decode(optional($this->uplink)['devEUI']));
    }
}