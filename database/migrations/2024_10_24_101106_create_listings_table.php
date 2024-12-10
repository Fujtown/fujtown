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
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('listing_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('listing_package');
            $table->unsignedBigInteger('user_id');
            $table->string('listing_name', 100);
            $table->string('listing_name_arabic')->nullable();
            $table->string('listurl');
            $table->string('listing_region', 20);
            $table->string('listing_lat', 20);
            $table->string('listing_long', 20);
            $table->string('listing_additional_info', 150);
            $table->integer('listing_pobox')->nullable();
            $table->string('listing_cover_image');
            $table->tinyInteger('listing_freezone');
            $table->string('listing_web_url', 50);
            $table->string('listing_email', 50);
            $table->string('listing_landline', 20);
            $table->string('listing_phone', 20);
            $table->string('listing_facebook')->nullable();
            $table->string('listing_instagram')->nullable();
            $table->string('listing_twitter')->nullable();
            $table->string('listing_youtube')->nullable();
            $table->string('listing_google')->nullable();
            $table->string('listing_linkedin')->nullable();
            $table->mediumText('listing_desc')->nullable();
            $table->integer('listing_status');
            $table->integer('listing_featured');
            $table->integer('listing_popular');
            $table->integer('listing_view_counter');
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_desc')->nullable();
            $table->date('listing_date');
            $table->dateTime('link_open_date')->comment('Listing Renewal');
            $table->dateTime('visited_date')->comment('Listing Renewal');
            $table->enum('paid_by', ['COD','NOON' ,'TAP', 'PayPal', '', 'Pending'])->default('');
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->onDelete('cascade');
                  
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
