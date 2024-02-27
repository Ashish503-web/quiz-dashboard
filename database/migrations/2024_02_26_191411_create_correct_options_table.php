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
        Schema::create('correct_options', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key column named 'id'
            $table->unsignedBigInteger('question_id'); // Creates a column to store the ID of the associated question
            $table->unsignedBigInteger('option_id'); // Creates a column to store the ID of the correct option
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns for tracking timestamp
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correct_options');
    }
};
