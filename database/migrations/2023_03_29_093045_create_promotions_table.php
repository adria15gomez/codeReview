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

        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('trainer');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->string('evaluation1')->nullable();
            $table->string('evaluation2')->nullable();
            $table->string('evaluation3')->nullable();
            $table->string('evaluation4')->nullable();
            $table->string('zoom_url')->nullable();
            $table->string('slack_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
