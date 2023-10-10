
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
        Schema::create('Authors', function( Blueprint $table )
        {
            $table -> id();
            $table -> string('name_of_the_Author');
            $table -> text('biography');
            $table -> date('author_birthdate');
            $table -> string('nationality');
            $table->timestamps(); // Add timestamps here
            
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

