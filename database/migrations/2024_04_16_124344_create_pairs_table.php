<?php

use App\Models\Race;
use App\Models\RaceParticipant;
use App\Models\User;
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
        Schema::create('pairs', function (Blueprint $table) {
            $table->id();            
            $table->foreignIdFor(RaceParticipant::class, 'guide_pair');
            $table->foreignIdFor(RaceParticipant::class, 'athlete_pair');
            $table->timestamps();

            $table->unique(['guide_pair', 'athlete_pair']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pairs');
    }
};
