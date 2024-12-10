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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_user_name', 50);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('customer_phone', 50);
            $table->string('email', 50);
            $table->string('customer_password', 50);
            $table->enum('oauth_provider', ['', 'facebook', 'google', 'twitter']);
            $table->string('oauth_uid', 255);
            $table->string('gender', 255);
            $table->string('locale', 255);
            $table->string('picture', 255);
            $table->string('link', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
