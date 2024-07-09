<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
use App\Models\Uplink;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UplinkFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create(
            [
            'name' => 'Admin',
            'email' => 'cpakustik@gmail.com',
            'password' => 'xddfakertssk',
        ]);
        // $device1 = Device::factory()->create();
        // Uplink::Factory(5)->create(['device_id'=> $device1->device_id]);

        // $device2 = Device::factory()->create();
        // Uplink::Factory(5)->create(['device_id'=> $device2->device_id]);
    }
}
