<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('driver_id',100)->nullable();
            $table->string('user_id',100)->nullable();
            $table->string('vehicle_type_id',100)->nullable();
            $table->string('pickup_point',100)->nullable();
            $table->string('destination',100)->nullable();
            $table->string('distance',100)->nullable();
            $table->string('bill',100)->nullable();
            $table->string('rating',100)->nullable();
            $table->string('review',100)->nullable();
            $table->string('creator',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->string('status',100)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
