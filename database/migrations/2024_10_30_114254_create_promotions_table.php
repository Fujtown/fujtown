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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->string('deal_name', 255);
            $table->string('deal_image', 255);
            $table->string('deal_price', 50);
            $table->integer('deal_sort_order')->unsigned();
            $table->mediumText('deal_desc');
            $table->integer('deal_counter')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('customer_id');
            $table->date('expiry_date');
            $table->string('url', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
