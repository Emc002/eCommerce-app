<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name',100);
            $table->dateTime('email_verified_at')->nullable();
            $table->string('email',255)->unique();
            $table->string('phone',20);
            $table->string('password',255);
            $table->enum('role', ['admin', 'user']);
            $table->string('provider_id',255)->nullable();
            $table->string('provider',255)->nullable();
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
};
