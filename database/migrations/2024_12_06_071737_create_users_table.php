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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 15);
            $table->string('user_email', 60)->unique();
            $table->string('user_pswd', 255);
            $table->string('user_fname', 50);
            $table->string('user_address', 255);
            $table->string('user_phone', 15);
            $table->string('user_city', 25);
            $table->string('user_country', 25);
            $table->integer('user_status', false, true)->length(3);
            $table->integer('user_ac_status', false, true)->length(3);
            $table->timestamps(); // Add created_at and updated_at
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
