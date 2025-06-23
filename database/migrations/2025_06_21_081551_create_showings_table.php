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
        Schema::create('showings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->unsigned()->index()->nullable(false);
            $table->foreign('unit_id')->on('units')->references('id')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index()->nullable(false);
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');

            $table->date('showing_date');
            $table->time('showing_time');            
            $table->enum('showing_status', ['scheduled', 'rescheduled', 'cancelled', 'confirmed'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showings');
    }
};
