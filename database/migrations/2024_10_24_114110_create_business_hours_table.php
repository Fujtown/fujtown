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
        Schema::create('business_hours', function (Blueprint $table) {
            $table->increments('business_hour_id');
            $table->integer('listing_id')->unsigned();
            $table->string('sunday_open', 50)->nullable();;
            $table->string('sunday_close', 50)->nullable();;
            $table->string('monday_open', 50)->nullable();;
            $table->string('monday_close', 50)->nullable();;
            $table->string('tuesday_open', 50)->nullable();;
            $table->string('tuesday_close', 50)->nullable();;
            $table->string('wednesday_open', 50)->nullable();;
            $table->string('wednesday_close', 50)->nullable();;
            $table->string('thursday_open', 50)->nullable();;
            $table->string('thursday_close', 50)->nullable();;
            $table->string('friday_open', 50)->nullable();;
            $table->string('friday_close', 50)->nullable();;
            $table->string('saturday_open', 50)->nullable();;
            $table->string('saturday_close', 50)->nullable();;
            $table->timestamps();

            $table->foreign('listing_id')
                  ->references('listing_id')
                  ->on('listings')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_hours');
    }
};
