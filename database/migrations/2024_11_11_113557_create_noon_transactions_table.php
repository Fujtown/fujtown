<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('noon_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tr_id', 100);
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('date', 150)->nullable();
            $table->text('message')->nullable();
            $table->string('reference', 255)->nullable();
            $table->string('mode', 100)->nullable();
            $table->string('intAccount', 255)->nullable();
            $table->text('paymentInfo')->nullable();
            $table->string('brand', 100)->nullable();
            $table->integer('expiryMonth')->nullable();
            $table->integer('expiryYear')->nullable();
            $table->string('cardCountry', 50)->nullable();
            $table->string('cardCountryName', 255)->nullable();
            $table->string('cardIssuerName', 255)->nullable();
            $table->unsignedBigInteger('order_id'); // New field for order_id
            $table->timestamps();

            // Foreign key constraint for order_id
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noon_transactions');
    }
};
