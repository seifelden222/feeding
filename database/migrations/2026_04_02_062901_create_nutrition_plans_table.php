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
        Schema::create('nutrition_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_program_id')->constrained('treatment_programs')->cascadeOnDelete();
            $table->string('title');
            $table->unsignedInteger('daily_calorie_target')->nullable();
            $table->decimal('protein_g', 8, 2)->nullable();
            $table->decimal('carb_g', 8, 2)->nullable();
            $table->decimal('fat_g', 8, 2)->nullable();
            $table->text('plan_notes')->nullable();
            $table->string('status', 20)->default('draft');
            $table->foreignId('created_by_specialist_user_id')
                ->constrained('specialist_profiles', 'user_id')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_plans');
    }
};
