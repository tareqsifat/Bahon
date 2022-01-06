<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Driver;
use App\Models\User;
use App\Models\vehicle;
use App\Models\VehicleOwner;
use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        Driver::factory(20)->create();
        VehicleType::factory(6)->create();
        Category::factory(16)->create();
        VehicleOwner::factory(10)->create();
        vehicle::factory(25)->create();
    }
}