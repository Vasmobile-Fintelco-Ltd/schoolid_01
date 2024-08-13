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
        Schema::table('questions', function (Blueprint $table) {
            $table->string('question_type')->nullable();
            $table->string('curriculum')->nullable();
            $table->string('year')->nullable();
            $table->string('option1')->nullable()->change(); 
            $table->string('option2')->nullable()->change();
            $table->string('option3')->nullable()->change();
            $table->string('option4')->nullable()->change();
            $table->string('answer')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('question_type');
            $table->dropColumn('curriculum');
            $table->dropColumn('year');
            $table->string('option1')->nullable(false)->change();
            $table->string('option2')->nullable(false)->change();
            $table->string('option3')->nullable(false)->change();
            $table->string('option4')->nullable(false)->change();
            $table->string('answer')->nullable(false)->change();
        });
    }
};
