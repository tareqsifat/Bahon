<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehicleOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nid_no'=> rand(10000000000, 99999999999),
            'creator' => 1,
            'slug' => Str::random(10),
            'status' => 1
        ];
    }
}
