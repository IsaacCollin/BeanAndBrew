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
            $table->string('description', 110);
            $table->text('body', 1000);
            $table->text('body_2', 1000);
            $table->text('body_3', 1000);
            $table->string('image_url', 2048);
            $table->string('image_alt', 40);
            $table->string('image_url_2', 2048)->nullable();
            $table->string('image_alt_2', 40)->nullable();
            $table->string('image_url_3', 2048)->nullable();
            $table->string('image_alt_3', 40)->nullable();
            $table->string('user_name');
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
