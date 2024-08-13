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
        Schema::create('brain_game_transcations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('centi20')->nullable();
            $table->string('centi15')->nullable();
            $table->string('centi5')->nullable();
            $table->string('trans_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brain_game_transcations');
    }
};
