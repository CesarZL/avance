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
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->string('day'); // Día de la semana (Monday, Tuesday, etc.)
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('has_appointments')->default(false); // ¿Habrá citas este día?
            $table->timestamps();
        
            $table->foreign('doctor_id')->references('id')->on('doctores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_schedules');
    }
};
