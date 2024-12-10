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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('ad_name', 100);
            $table->integer('ad_status', false, true)->length(2); // assuming 1 for active, 0 for inactive
            $table->integer('ad_order')->unsigned();
            $table->string('ad_url', 100);
            $table->string('ad_image', 150);
            $table->mediumText('ad_description');
            $table->string('add_position', 10); // e.g., top, bottom, sidebar
            $table->bigInteger('last_shown')->unsigned(); // to store timestamps or counts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
