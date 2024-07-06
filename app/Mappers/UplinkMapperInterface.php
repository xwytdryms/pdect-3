<?php

namespace App\Mappers;

interface UplinkMapperInterface
{
    public function getDeviceId();

    public function getPort();

    /**
     * Get Timestamp
     *
     * @return \Carbon\Carbon
     */
    public function getTime();

    public function getPayload();

    public function getCounter();

    public function getEui();

    public function getStatus();

    public function getdBA();
    
    public function getdBMax();

    public function getdBMin();

    public function getArc();

}