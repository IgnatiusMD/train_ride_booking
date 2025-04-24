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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('train_id')->constrained()->onDelete('cascade');
            $table->foreignId('origin_station_id')->constrained('stations')->onDelete('cascade');
            $table->foreignId('destination_id')->constrained('stations')->onDelete('cascade');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
