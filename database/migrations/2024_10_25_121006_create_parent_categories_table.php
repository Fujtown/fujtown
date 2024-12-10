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
        Schema::create('parent_categories', function (Blueprint $table) {
            $table->id();
            $table->string('parent_category_name', 255);
            $table->string('parent_category_name_arabic', 255);
            $table->string('parent_url', 255);
            $table->string('parent_category_thumb', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_categories');
    }
};
