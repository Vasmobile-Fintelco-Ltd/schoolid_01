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
        Schema::table('nonstudents', function (Blueprint $table) {
            $table->string('brain_game_status')->default(0);
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nonstudents', function (Blueprint $table) {
            $table->dropColumn('brain_game_status','phone_number');

        });
    }
};