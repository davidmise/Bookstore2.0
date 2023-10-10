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
        Schema::create('Readers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table -> unsignedBigInteger('cart_id');
            $table -> unsignedBigInteger('order_id');
            $table->timestamps();


            $table->foreign('order_id')->references('id')->on('Orders')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('Order_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Readers');
    }
};
