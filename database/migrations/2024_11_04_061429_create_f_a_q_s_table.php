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
        Schema::create('f_a_q_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_cat_id');
            $table->string('title', 100);
            $table->text('description');
            $table->timestamps();

              // Foreign key constraint if 'faq_categories' table exists
            $table->foreign('faq_cat_id')->references('id')->on('f_a_q_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_a_q_s');
    }
};
