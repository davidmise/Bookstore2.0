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
        Schema::create('Reviews', function(Blueprint $table)
        {
        $table -> id();
        $table ->  unsignedBigInteger('user_id');
        $table ->  unsignedBigInteger('book_id');
        $table -> decimal('ratings',3,2);
        $table -> text('comments'); //comments / reviews left by then 
        
        $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
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

