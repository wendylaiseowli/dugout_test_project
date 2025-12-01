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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('phoneNumber', 15);
            $table->string('tableNumber', 10);
            $table->integer('branchID')->default(1);
            $table->integer('matchID');
            $table->integer('homeTeamPrediction');
            $table->integer('awayTeamPrediction');
            $table->string('cookieID');
            $table->tinyInteger('isWinner');
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
