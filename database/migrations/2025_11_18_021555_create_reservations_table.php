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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->constrained();
            $table->string('reservation_name', 300);
            $table->timestamp('reservation_date')->nullable();
            $table->timestamp('reservation_time')->nullable();
            $table->integer('number_of_people');
            $table->string('phone_number',15);
            $table->string('email',100);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
