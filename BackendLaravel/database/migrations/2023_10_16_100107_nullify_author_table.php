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
        Schema::table('Authors', function (Blueprint $table)
        {   
            $table -> string('name_of_the_Author')->nullable()->change();
            $table -> text('biography')->nullable()->change();
            $table -> date('author_birthdate')->nullable()->change();
            $table -> string('nationality')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('Authors', function (Blueprint $table)
        {
            $table -> string('name_of_the_Author')->change();
            $table -> text('biography')->change();
            $table -> date('author_birthdate')->change();
            $table -> string('nationality')->change();
        });
    }
};
