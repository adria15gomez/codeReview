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
        Schema::create('evaluations_topics_autoevaluations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_topic');
            $table->unsignedBigInteger('id_evaluation');

            $table->foreign('id_topic')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('id_evaluation')->references('id')->on('evaluations')->onDelete('cascade');

            $table->tinyInteger('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations_topics_autoevaluations');
    }
};
