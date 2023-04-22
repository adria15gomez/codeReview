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
            $table->date('evaluation_date');
            $table->foreignId('id_user_evaluated')->references('id')->on('users');
            $table->foreignId('id_user_coevaluator')->nullable()->references('id')->on('users');
            $table->tinyInteger('pp_autoeval')->nullable();
            $table->tinyInteger('pp_coeval')->nullable();
            $table->timestamps();
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
