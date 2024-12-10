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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_id');
            $table->unsignedBigInteger('blog_cat_id');
            $table->string('title', 250);
            $table->string('url', 250);
            $table->text('keywords');
            $table->text('image');
            $table->text('description');
            $table->timestamps();

            // Foreign key constraint if 'blog_categories' table exists
            $table->foreign('blog_cat_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
