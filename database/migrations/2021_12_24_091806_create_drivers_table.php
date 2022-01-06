<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',100)->nullable();
            $table->string('confirmed',100)->nullable();
            $table->string('driving_license_no',100)->nullable();
            $table->string('driving_license_front',100)->nullable();
            $table->string('driving_license_back',100)->nullable();
            $table->string('banned',100)->nullable();
            $table->string('date_of_birth',100)->nullable();
            $table->string('height',100)->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
