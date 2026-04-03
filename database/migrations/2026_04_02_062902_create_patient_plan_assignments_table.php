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
        Schema::create('patient_plan_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_case_id')->constrained('patient_cases')->cascadeOnDelete();
            $table->foreignId('treatment_program_id')->constrained('treatment_programs')->restrictOnDelete();
            $table->foreignId('nutrition_plan_id')->constrained('nutrition_plans')->restrictOnDelete();
            $table->foreignId('sports_program_id')->nullable()->constrained('sports_programs')->nullOnDelete();
            $table->foreignId('assigned_by_specialist_user_id')
                ->constrained('specialist_profiles', 'user_id')
                ->restrictOnDelete();
            $table->timestamp('assigned_at')->useCurrent();
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->string('status', 20)->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_plan_assignments');
    }
};
