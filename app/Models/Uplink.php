<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uplink extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $casts = [
        'latest_payload' => 'array',
    ];
    

    public function device()
    { 
        return $this->belongsTo(Device::class, 'device_id', 'device_id');
    }

    public function latestPayload()
    {
        $payload = collect($this->payloads)->last();

        return collect($payload)->except(['rssi', 'counter', 'frequency'])->toArray();
    }
}
