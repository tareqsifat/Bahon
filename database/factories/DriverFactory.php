<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,50),
            'driving_license_no' => rand(1000000000,9999999999),
            'driving_license_front' => 'uploads/driver/front_' . rand(1,5) . '.jpg',
            'driving_license_back' => 'uploads/driver/back_' . rand(1,5) . '.jpg',
            'date_of_birth' => rand(1980,2010). '-0' . rand(1,9) . '-' . rand(10,28) ,
            'height' => rand(4, 5) . '.' . rand(1,9),
            'banned'=> 0,
            'confirmed'=> 0,
            'creator'=> 1,
            'slug'=>Str::random(10),
            'status'=> 1
        ];
    }
}
