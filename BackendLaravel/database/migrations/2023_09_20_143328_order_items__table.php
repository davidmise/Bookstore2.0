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
        //
        Schema::create('Order_items', function(Blueprint $table)
        {
            $table -> id();
            $table -> unsignedBigInteger('order_id');
            $table -> unsignedBigInteger('book_id');
            $table -> integer('quantity'); //quantity of books purchased in the order
            $table->timestamps(); // Add timestamps here

            $table->foreign('order_id')->references('id')->on('Orders')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('Books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

