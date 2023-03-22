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
            $table->string('title', 40);
            $table->enum('category', [
                'Bakery', 'Breakfast',
                'Sandwiches and Wraps',
                'Smoothies and Juices',
                'Snacks and Desserts'
            ]);
            $table->text('description', 110);
            $table->text('body');
            $table->text('body_2');
            $table->text('body_3')->nullable();
            $table->string('image_url', 255);
            $table->string('image_alt', 40);
            $table->string('image_url_2', 255);
            $table->string('image_alt_2', 40);
            $table->string('image_url_3', 255)->nullable();
            $table->string('image_alt_3', 40)->nullable();
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
