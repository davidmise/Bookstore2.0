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
        Schema::create('Books', function( Blueprint $table){
            $table -> id();
            $table -> string('title');
            $table -> text('description');
            $table -> unsignedBigInteger('Author_id');
            $table -> unsignedBigInteger('genre_id');
            $table -> decimal('price', 8,2);
            $table -> date('published_date');
            $table -> string('cover_image');
            $table->timestamps(); // Add timestamps here

            $table->foreign('Author_id')->references('id')->on('Authors')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('Genres')->onDelete('cascade');

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

