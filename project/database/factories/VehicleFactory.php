<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_type_id' => rand(1,10),
            'road_permit_no' =>'Dhaka Metro'. ' - ' . 'Dha' . rand(11,99) . ' - ' . rand(1000,9999),
            'chesis_no' =>rand(111111,999999),
            'vehicle_owner_id' =>rand(1,10),
            'creator' =>1,
            'slug' =>Str::random(10),
            'status' =>1,
        ];
    }
}
