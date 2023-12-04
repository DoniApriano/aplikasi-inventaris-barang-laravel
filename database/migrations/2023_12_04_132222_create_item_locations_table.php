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
        Schema::create('item_locations', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('item_code');
            $table->string('store_house_code');
            $table->timestamps();

            $table->foreign('item_code')->references('code')->on('items');
            $table->foreign('store_house_code')->references('code')->on('store_houses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_locations');
    }
};
