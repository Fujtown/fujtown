<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First drop any existing table to avoid conflicts
        Schema::dropIfExists('users');

        Schema::create('admin', function (Blueprint $table) {
            $table->increments('admin_id');  // true makes it auto-increment
            $table->string('user_name', 15);
            $table->string('user_email', 60)->unique();
            $table->string('user_pswd', 255);
            $table->string('user_fname', 50);
            $table->string('user_address', 255);
            $table->string('user_phone', 15);
            $table->string('user_city', 25);
            $table->string('user_country', 25);
            $table->integer('user_status');
            $table->integer('user_ac_status');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
