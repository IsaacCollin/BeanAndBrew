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
            $table->enum('category', [
                'bakery', 'breakfast',
                'sandwiches', 'wraps',
                'smoothie', 'snacks',
                'desserts'
            ]);
            $table->string('title', 40);
            $table->string('description', 100);
            $table->string('user_name');

            $table->morphs('record');
            $table->string('field');
            $table->longText('body')->nullable();
            $table->timestamps();

            $table->unique(['field', 'record_type', 'record_id']);
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
