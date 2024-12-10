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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name', 255);
            $table->string('category_name_arabic', 255);
            $table->string('url', 255);
            $table->string('category_image', 200);
            $table->string('category_thumb', 255);
            $table->integer('category_parent_id')->default(0);
            $table->integer('category_status')->default(1);
            $table->string('category_icon', 100);
            $table->mediumText('category_description');
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('categories');
    }
};
