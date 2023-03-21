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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('category');
            $table->string('title', 40);
            $table->text('body');
            $table->text('body_2');
            $table->string('image_url', 255);
            $table->string('image_alt', 40);
            $table->string('image_url_2', 255);
            $table->string('image_alt_2', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
