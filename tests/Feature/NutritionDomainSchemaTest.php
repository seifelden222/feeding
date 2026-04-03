<?php

use App\Models\FollowUpMeasurement;
use App\Models\FollowUpReport;
use App\Models\MealTemplate;
use App\Models\NutritionPlan;
use App\Models\PatientCase;
use App\Models\PatientPlanAssignment;
use App\Models\PatientProfile;
use App\Models\Role;
use App\Models\SpecialistProfile;
use App\Models\SportsProgram;
use App\Models\TreatmentProgram;
use App\Models\User;

it('supports explicit admin role assignment', function () {
    $user = User::factory()->create();
    $adminRole = Role::query()->create(['name' => 'admin']);

    $user->roles()->attach($adminRole);

    expect($user->fresh()->hasRole('admin'))->toBeTrue();
});

it('builds the nutrition assignment and follow-up graph', function () {
    $patientUser = User::factory()->create();
    $specialistUser = User::factory()->create();

    PatientProfile::query()->create([
        'user_id' => $patientUser->id,
        'sex' => 'female',
        'height_cm' => 165.50,
    ]);

    SpecialistProfile::query()->create([
        'user_id' => $specialistUser->id,
        'license_number' => 'LIC-1001',
        'specialty' => 'Clinical Nutrition',
        'years_experience' => 7,
    ]);

    $patientCase = PatientCase::query()->create([
        'patient_user_id' => $patientUser->id,
        'specialist_user_id' => $specialistUser->id,
        'status' => 'open',
    ]);

    $treatmentProgram = TreatmentProgram::query()->create([
        'patient_case_id' => $patientCase->id,
        'title' => 'Metabolic Reset',
        'clinical_objective' => 'Improve weight and glucose trend.',
        'status' => 'active',
        'created_by_specialist_user_id' => $specialistUser->id,
    ]);

    $sportsProgram = SportsProgram::query()->create([
        'treatment_program_id' => $treatmentProgram->id,
        'title' => 'Walking Plan',
        'frequency_per_week' => 4,
        'intensity_level' => 'moderate',
        'status' => 'active',
        'created_by_specialist_user_id' => $specialistUser->id,
    ]);

    $nutritionPlan = NutritionPlan::query()->create([
        'treatment_program_id' => $treatmentProgram->id,
        'title' => 'Low GI Plan',
        'daily_calorie_target' => 1800,
        'protein_g' => 120,
        'carb_g' => 170,
        'fat_g' => 60,
        'plan_notes' => 'Reduce refined carbs.',
        'status' => 'active',
        'created_by_specialist_user_id' => $specialistUser->id,
    ]);

    $mealTemplate = MealTemplate::query()->create([
        'name' => 'Breakfast Bowl',
        'meal_type' => 'breakfast',
        'meal_notes' => 'Increase protein and avoid allergens.',
        'created_by_specialist_user_id' => $specialistUser->id,
    ]);

    $nutritionPlan->mealTemplates()->attach($mealTemplate->id, [
        'day_of_week' => 1,
        'sequence_no' => 1,
    ]);

    $assignment = PatientPlanAssignment::query()->create([
        'patient_case_id' => $patientCase->id,
        'treatment_program_id' => $treatmentProgram->id,
        'nutrition_plan_id' => $nutritionPlan->id,
        'sports_program_id' => $sportsProgram->id,
        'assigned_by_specialist_user_id' => $specialistUser->id,
        'effective_from' => now()->toDateString(),
        'status' => 'active',
    ]);

    $report = FollowUpReport::query()->create([
        'patient_case_id' => $patientCase->id,
        'assignment_id' => $assignment->id,
        'patient_user_id' => $patientUser->id,
        'specialist_user_id' => $specialistUser->id,
        'treatment_program_id' => $treatmentProgram->id,
        'nutrition_plan_id' => $nutritionPlan->id,
        'sports_program_id' => $sportsProgram->id,
        'report_date' => now()->toDateString(),
        'adherence_score' => 85,
        'specialist_assessment' => 'Progress is steady.',
        'next_actions' => 'Increase protein at dinner.',
        'created_by_specialist_user_id' => $specialistUser->id,
    ]);

    FollowUpMeasurement::query()->create([
        'follow_up_report_id' => $report->id,
        'weight_kg' => 78.4,
        'waist_cm' => 92.0,
        'blood_glucose_mg_dl' => 118,
    ]);

    expect($assignment->fresh()->nutritionPlan->title)->toBe('Low GI Plan')
        ->and($assignment->fresh()->sportsProgram?->title)->toBe('Walking Plan')
        ->and($report->fresh()->assignment->id)->toBe($assignment->id)
        ->and($report->fresh()->patient->user_id)->toBe($patientUser->id)
        ->and($report->fresh()->measurements)->toHaveCount(1)
        ->and($nutritionPlan->fresh()->mealTemplates)->toHaveCount(1);
});
