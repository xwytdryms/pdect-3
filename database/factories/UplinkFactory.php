<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\Uplink;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Uplink>
 */
class UplinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'port' => fake()->randomDigit(),
            'date' => fake()->date(),
            'device_id'=> Device::Factory(),
            'payloads' => collect([
                'dBMin' => fake()->randomFloat(2, 0, 100),
                'dBMax' => fake()->randomFloat(2, 0, 100),
                'dBA' => fake()->randomFloat(2, 0, 100),
                'Arc'    => fake()->randomFloat(2, 0, 100),
                'battery' => fake()->randomFloat(2, 0, 100),
                'status' => fake()->randomElements(['Normal','Waspada','Kritis'])
            ]),
        ];
    }
}