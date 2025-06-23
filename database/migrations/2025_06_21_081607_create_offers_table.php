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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('lat');
            $table->string('lng');
            $table->string('location', 500);
            $table->decimal('price', 10,2);
            $table->date('closing_date');
            $table->date('expire_date');
            $table->string('bathrooms');
            $table->string('bedrooms');
            $table->string('parkings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
