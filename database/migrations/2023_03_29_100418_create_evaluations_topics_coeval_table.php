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
        Schema::create('evaluations_topics_coeval', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('level');
            $table->foreignId('id_user_autoevaluator')->constrained('users');
            $table->foreignId('id_topic')->constrained('topics');
            $table->foreignId('id_evaluation')->constrained('evaluations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations_topics_coeval');
    }
};
