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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable(false);
            $table->boolean('near_beach')->nullable(false)->default(false);
            $table->boolean('accepts_pets')->nullable(false)->default(false);
            $table->unsignedInteger('sleeps')->nullable(false);
            $table->unsignedInteger('beds')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
