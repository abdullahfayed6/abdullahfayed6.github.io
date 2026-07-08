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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // e.g. AI Platform, ML App
            $table->text('description');
            $table->string('image'); // path to image
            $table->string('github_url')->nullable();
            $table->string('project_url')->nullable();
            $table->string('role')->nullable();
            $table->string('project_date')->nullable();
            $table->text('key_features')->nullable(); // stored as JSON/text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
