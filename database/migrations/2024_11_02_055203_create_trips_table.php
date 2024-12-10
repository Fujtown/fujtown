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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_title', 100);
            $table->string('url', 255);
            $table->string('trip_price', 50);
            $table->string('trip_image', 100);
            $table->date('trip_date');
            $table->date('end_date');
            $table->string('trip_type', 50);
            $table->string('trip_status', 50);
            $table->mediumText('trip_description');
            $table->tinyInteger('trip_upcoming')->default(0);
            $table->mediumText('meta_title');
            $table->mediumText('meta_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
