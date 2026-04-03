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
        Schema::create('follow_up_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_case_id')->constrained('patient_cases')->cascadeOnDelete();
            $table->foreignId('assignment_id')->constrained('patient_plan_assignments')->cascadeOnDelete();
            $table->foreignId('patient_user_id')->constrained('patient_profiles', 'user_id')->restrictOnDelete();
            $table->foreignId('specialist_user_id')->constrained('specialist_profiles', 'user_id')->restrictOnDelete();
            $table->foreignId('treatment_program_id')->constrained('treatment_programs')->restrictOnDelete();
            $table->foreignId('nutrition_plan_id')->constrained('nutrition_plans')->restrictOnDelete();
            $table->foreignId('sports_program_id')->nullable()->constrained('sports_programs')->nullOnDelete();
            $table->date('report_date');
            $table->unsignedTinyInteger('adherence_score')->nullable();
            $table->text('patient_feedback')->nullable();
            $table->text('specialist_assessment')->nullable();
            $table->text('next_actions')->nullable();
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
        Schema::dropIfExists('follow_up_reports');
    }
};
