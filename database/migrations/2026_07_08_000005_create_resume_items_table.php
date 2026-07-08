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
        Schema::create('resume_items', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // e.g. experience, internship, education, volunteering
            $table->string('title');
            $table->string('subtitle')->nullable(); // e.g. Timeline
            $table->string('institution')->nullable(); // e.g. Company or School
            $table->text('description')->nullable(); // supporting text or bullet points (new lines)
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_items');
    }
};
