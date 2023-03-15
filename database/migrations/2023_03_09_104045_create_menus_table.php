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
            $table->string('item_title', 40);
            $table->enum('item_type', ['Drinks', 'Bakery']);
            $table->string('item_desc', 80);
            $table->float('item_price', 4, 2);
            $table->string('item_img', 255);
            $table->string('img_alt', 50);
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
