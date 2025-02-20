<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_type_id'=> rand(1,10),
            'seat'=> rand(1,40),
            'AC'=> rand(0,1),
            'feet'=> rand(0,20),
            'ton'=> rand(0,5)
        ];
    }
}
