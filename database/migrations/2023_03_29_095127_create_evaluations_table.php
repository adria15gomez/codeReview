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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            //$table->foreignId('pivot_coevaluation_id')->constrained('pivot_coevaluations');
            //$table->foreignId('pivot_autoevaluator_id')->constrained('pivot_auto_evaluations');
            $table->timestamps();
            $table->tinyInteger('autoeval average');
            $table->tinyInteger('coeval average');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
