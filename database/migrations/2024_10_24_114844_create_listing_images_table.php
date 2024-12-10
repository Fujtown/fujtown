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
       
        Schema::create('listing_images', function (Blueprint $table) {
            $table->increments('list_img_id');
            $table->integer('listing_id')->unsigned();
            $table->string('listing_images', 100);
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
        Schema::dropIfExists('listing_images');
    }
};
