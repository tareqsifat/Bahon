<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('fullname')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable()->unique();
            $table->string('urgent_mobile_number')->nullable()->unique();
            $table->string('nid_card_number')->nullable()->unique();
            $table->string('password');
            $table->string('creator',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
