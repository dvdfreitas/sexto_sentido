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
        Schema::create('race_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('race_edition')->constrained();
            $table->string('image')->nullable();
            // Race Type (Kids, adults, ...)
            // Race Condition
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            // Has Accessibility
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_details');
    }
};
