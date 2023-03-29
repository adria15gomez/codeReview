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
        Schema::create('autoevaluation_coevaluation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('autoevaluation_id');
            $table->unsignedBigInteger('coevaluation_id');

            $table->foreign('autoevaluation_id')->references('id')->on('autoevaluations')->onDelete('cascade');
            $table->foreign('coevaluation_id')->references('id')->on('coevaluations')->onDelete('cascade');

            $table->date('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autoevaluation_coevaluation');
    }
};
