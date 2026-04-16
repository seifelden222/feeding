<?php

namespace Database\Seeders;

use App\Models\MealTemplate;
use App\Models\NutritionPlan;
use App\Models\TreatmentProgram;
use App\Models\PatientCase;
use App\Models\SpecialistProfile;
use App\Models\PatientProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestNutritionPlansSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure there is a specialist user and profile
        $specialistUser = User::firstOrCreate([
            'email' => 'seed-specialist@example.com',
        ], [
            'name' => 'Seed Specialist',
            'role' => 'trainer',
            'password' => bcrypt(Str::random(12)),
        ]);

        SpecialistProfile::firstOrCreate([
            'user_id' => $specialistUser->id,
        ], [
            'license_number' => 'SEED-'.Str::upper(Str::random(6)),
            'specialty' => 'تغذية',
            'years_experience' => 5,
        ]);

        // Ensure there is a patient user and patient profile
        $patientUser = User::firstOrCreate([
            'email' => 'seed-patient@example.com',
        ], [
            'name' => 'Seed Patient',
            'role' => 'user',
            'password' => bcrypt(Str::random(12)),
        ]);

        PatientProfile::firstOrCreate([
            'user_id' => $patientUser->id,
        ], [
            'date_of_birth' => now()->subYears(30)->toDateString(),
        ]);

        // Create a patient case linking patient and specialist
        $case = PatientCase::firstOrCreate([
            'patient_user_id' => $patientUser->id,
            'specialist_user_id' => $specialistUser->id,
        ], [
            'status' => 'open',
            'opened_at' => now(),
        ]);

        // Create a treatment program for that case
        $treatment = TreatmentProgram::firstOrCreate([
            'patient_case_id' => $case->id,
            'title' => 'Seed Treatment Program',
        ], [
            'clinical_objective' => 'General wellness and nutrition seed program',
            'start_date' => now()->toDateString(),
            'status' => 'active',
            'created_by_specialist_user_id' => $specialistUser->id,
        ]);

        // Diabetes plan
        $diabetes = NutritionPlan::firstOrCreate([
            'title' => 'تغذية مرضى السكري',
            'treatment_program_id' => $treatment->id,
        ], [
            'daily_calorie_target' => 2200,
            'plan_notes' => 'خطة نموذجية لمرضى السكري',
            'status' => 'active',
            'created_by_specialist_user_id' => $specialistUser->id,
        ]);

        $tpl1 = MealTemplate::firstOrCreate(['name' => 'شوفان مع فاكهة ومكسرات'], ['default_calories' => 380, 'meal_type' => 'breakfast']);
        $tpl2 = MealTemplate::firstOrCreate(['name' => 'سلطة تونة مع خبز كامل'], ['default_calories' => 520, 'meal_type' => 'lunch']);
        $tpl3 = MealTemplate::firstOrCreate(['name' => 'خضار مشوي مع سمك'], ['default_calories' => 300, 'meal_type' => 'dinner']);

        $diabetes->mealTemplates()->syncWithoutDetaching([
            $tpl1->id => ['day_of_week' => null, 'sequence_no' => 1],
            $tpl2->id => ['day_of_week' => null, 'sequence_no' => 2],
            $tpl3->id => ['day_of_week' => null, 'sequence_no' => 3],
        ]);

        // Weight loss
        $wl = NutritionPlan::firstOrCreate(['title' => 'برنامج إنقاص الوزن', 'treatment_program_id' => $treatment->id], [
            'daily_calorie_target' => 1800,
            'plan_notes' => 'خطة فقدان وزن',
            'status' => 'active',
            'created_by_specialist_user_id' => $specialistUser->id,
        ]);

        $tpl4 = MealTemplate::firstOrCreate(['name' => 'أومليت خضار مع خبز شوفان'], ['default_calories' => 450, 'meal_type' => 'breakfast']);
        $tpl5 = MealTemplate::firstOrCreate(['name' => 'دجاج مشوي مع أرز وخضار'], ['default_calories' => 620, 'meal_type' => 'lunch']);
        $tpl6 = MealTemplate::firstOrCreate(['name' => 'زبادي يوناني مع فاكهة ومكسرات'], ['default_calories' => 320, 'meal_type' => 'dinner']);

        $wl->mealTemplates()->syncWithoutDetaching([
            $tpl4->id => ['day_of_week' => null, 'sequence_no' => 1],
            $tpl5->id => ['day_of_week' => null, 'sequence_no' => 2],
            $tpl6->id => ['day_of_week' => null, 'sequence_no' => 3],
        ]);

        // Muscle building
        $mb = NutritionPlan::firstOrCreate(['title' => 'برنامج بناء العضلات', 'treatment_program_id' => $treatment->id], [
            'daily_calorie_target' => 3000,
            'plan_notes' => 'خطة تضخيم عضلي',
            'status' => 'active',
            'created_by_specialist_user_id' => $specialistUser->id,
        ]);

        $tpl7 = MealTemplate::firstOrCreate(['name' => 'بيضتين مع توست بروتين'], ['default_calories' => 520, 'meal_type' => 'breakfast']);
        $tpl8 = MealTemplate::firstOrCreate(['name' => 'صدر دجاج مع بطاطا حلوة'], ['default_calories' => 700, 'meal_type' => 'lunch']);
        $tpl9 = MealTemplate::firstOrCreate(['name' => 'سموثي بروتين مع موز'], ['default_calories' => 420, 'meal_type' => 'dinner']);

        $mb->mealTemplates()->syncWithoutDetaching([
            $tpl7->id => ['day_of_week' => null, 'sequence_no' => 1],
            $tpl8->id => ['day_of_week' => null, 'sequence_no' => 2],
            $tpl9->id => ['day_of_week' => null, 'sequence_no' => 3],
        ]);
    }
}
