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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('product-title', 40);
            $table->string('product-description', 80);
            $table->string('product-image', 255);
            $table->string('product-image-alt', 60);
            $table->float('product-price', 4, 2);
            $table->enum('product-type', [
                'Coffee', 'Tea',
                'Bakery', 'Breakfast',
                'Sandwiches and Wraps',
                'Smoothies and Juices',
                'Snacks and Desserts'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
