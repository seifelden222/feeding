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
        Schema::create('trainer_plan_drafts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_user_id')->constrained('users')->cascadeOnDelete();
            $table->json('payload')->nullable();
            $table->timestamps();

            $table->unique('trainer_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_plan_drafts');
    }
};
