# Nutrition System Implementation Changes

## Overview

This file documents the implementation changes applied inside the Laravel project to move the old nutrition schema toward the reviewed production-ready design.

The work focused on:

- separating `admin` from normal domain users
- normalizing nutrition and meal data
- clarifying patient, specialist, plan, and report relationships
- replacing weak report linkage with assignment-driven follow-up tracking
- preparing the project for scalable backend development

## 1. Schema Changes

### Updated existing core table

- `users`
  - added `phone`
  - added `status`
  - kept Laravel auth structure intact

### Old schema migrations disabled

The following old migrations were kept in the project but turned into no-op migrations so the project can migrate without building the outdated structure:

- `2026_03_15_001830_create_clients_table.php`
- `2026_03_15_001831_create_nutritionists_table.php`
- `2026_03_15_001832_create_inquiries_table.php`
- `2026_03_15_001833_create_nutrition_plans_table.php`
- `2026_03_15_001834_create_therapeutic_programs_table.php`
- `2026_03_15_001835_create_reports_table.php`

This was done because the old structure mixed patient data, specialist data, plans, and reports in a non-scalable way.

### New domain tables added

#### Access control

- `roles`
- `permissions`
- `user_roles`
- `role_permissions`
- `admin_profiles`

#### User domain profiles

- `patient_profiles`
- `specialist_profiles`

#### Care workflow

- `patient_cases`
- `treatment_programs`
- `nutrition_plans`
- `sports_programs`
- `patient_plan_assignments`

#### Meal and ingredient normalization

- `meal_templates`
- `ingredients`
- `meal_ingredients`
- `nutrition_plan_meals`

#### Patient medical references

- `disease_catalog`
- `allergy_catalog`
- `patient_diseases`
- `patient_allergies`

#### Follow-up and reporting

- `follow_up_reports`
- `follow_up_measurements`
- `plan_adherence_logs`
- `report_snapshots`

## 2. Relationship Corrections

### Admin

- `admin` is now represented through:
  - `users`
  - `roles`
  - `user_roles`
  - optional `admin_profiles`

- Admin is no longer mixed conceptually with patient or specialist records.

### Patient and specialist

- `patient_profiles.user_id` references `users.id`
- `specialist_profiles.user_id` references `users.id`
- `patient_cases` now links:
  - `patient_user_id` -> `patient_profiles.user_id`
  - `specialist_user_id` -> `specialist_profiles.user_id`

### Programs and plans

- `treatment_programs` is now the umbrella clinical object under a patient case
- `nutrition_plans` belongs to one `treatment_program`
- `sports_programs` belongs to one `treatment_program`
- `patient_plan_assignments` links the patient case to the actual active plan/program combination

### Reports

- old report model linked only to the patient
- new `follow_up_reports` now links directly to:
  - `patient_case_id`
  - `assignment_id`
  - `patient_user_id`
  - `specialist_user_id`
  - `treatment_program_id`
  - `nutrition_plan_id`
  - optional `sports_program_id`

This makes the reporting model suitable for audit, analytics, and specialist-based access control.

## 3. Meal Design Fixes

### Meal description corrected

The old idea of `meal_description` was removed from the real schema path.

The new meal text field is:

- `meal_templates.meal_notes`

This field is intended for specialist notes only, for example:

- increase protein
- reduce carbs
- avoid allergy triggers
- preparation guidance

### Ingredients normalized

Ingredients are no longer expected inside meal text.

New structure:

- `meal_templates`
- `ingredients`
- `meal_ingredients`

This allows:

- multiple ingredients per meal
- nutrient calculations
- allergy screening
- reusable meal templates

## 4. Model Layer Changes

### Removed old models

The following old models were removed because they reflected the outdated structure:

- `Client`
- `Nutritionist`
- `TherapeuticProgram`
- `Report`
- `Inquiry`

### New models added

- `AdminProfile`
- `AllergyCatalog`
- `DiseaseCatalog`
- `FollowUpMeasurement`
- `FollowUpReport`
- `Ingredient`
- `MealTemplate`
- `PatientCase`
- `PatientPlanAssignment`
- `PatientProfile`
- `Permission`
- `PlanAdherenceLog`
- `ReportSnapshot`
- `Role`
- `SpecialistProfile`
- `SportsProgram`
- `TreatmentProgram`

### Updated existing models

- `User`
  - added role relation
  - added `adminProfile`, `patientProfile`, `specialistProfile`
  - added `hasRole()`

- `NutritionPlan`
  - now belongs to `TreatmentProgram`
  - now belongs to `SpecialistProfile` as creator
  - now connects to meal templates through `nutrition_plan_meals`
  - now connects to assignments and follow-up reports

## 5. Seeder Changes

`database/seeders/DatabaseSeeder.php` was updated to seed:

- base roles:
  - `admin`
  - `specialist`
  - `patient`

- core permissions for:
  - user management
  - case management
  - plan/program management
  - report access

- one demo user assigned to the `admin` role

## 6. Test Coverage Added

A new feature test was added:

- `tests/Feature/NutritionDomainSchemaTest.php`

It verifies:

- explicit admin role assignment works
- the full care graph can be built:
  - patient
  - specialist
  - patient case
  - treatment program
  - sports program
  - nutrition plan
  - meal template
  - assignment
  - follow-up report
  - follow-up measurement

### Test result

The targeted domain test passed:

- `php artisan test --compact --filter=NutritionDomainSchemaTest`

## 7. Migration Ordering Fixes

Several migration filenames were reordered so MySQL foreign keys can resolve in the correct sequence.

Examples:

- `patient_profiles` now runs before `patient_cases`
- `specialist_profiles` now runs before `patient_cases`
- `treatment_programs` now runs before:
  - `sports_programs`
  - `nutrition_plans`
- `patient_plan_assignments` now runs before `follow_up_reports`

## 8. MySQL Compatibility Fix

One MySQL index-name issue was fixed manually:

- file: `2026_04_02_062932_create_nutrition_plan_meals_table.php`
- issue: auto-generated unique index name exceeded MySQL identifier length
- fix: replaced the default generated name with:
  - `npm_plan_day_seq_unique`

## 9. Files Touched

### Main schema and seed files

- [database/migrations/0001_01_01_000000_create_users_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/0001_01_01_000000_create_users_table.php)
- [database/seeders/DatabaseSeeder.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/seeders/DatabaseSeeder.php)

### New migration set

- [database/migrations/2026_04_02_062849_create_admin_profiles_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062849_create_admin_profiles_table.php)
- [database/migrations/2026_04_02_062849_create_permissions_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062849_create_permissions_table.php)
- [database/migrations/2026_04_02_062849_create_roles_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062849_create_roles_table.php)
- [database/migrations/2026_04_02_062850_create_patient_profiles_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062850_create_patient_profiles_table.php)
- [database/migrations/2026_04_02_062851_create_specialist_profiles_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062851_create_specialist_profiles_table.php)
- [database/migrations/2026_04_02_062852_create_patient_cases_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062852_create_patient_cases_table.php)
- [database/migrations/2026_04_02_062900_create_treatment_programs_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062900_create_treatment_programs_table.php)
- [database/migrations/2026_04_02_062901_create_sports_programs_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062901_create_sports_programs_table.php)
- [database/migrations/2026_04_02_062901_create_nutrition_plans_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062901_create_nutrition_plans_table.php)
- [database/migrations/2026_04_02_062901_create_meal_templates_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062901_create_meal_templates_table.php)
- [database/migrations/2026_04_02_062901_create_ingredients_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062901_create_ingredients_table.php)
- [database/migrations/2026_04_02_062902_create_patient_plan_assignments_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062902_create_patient_plan_assignments_table.php)
- [database/migrations/2026_04_02_062903_create_follow_up_reports_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062903_create_follow_up_reports_table.php)
- [database/migrations/2026_04_02_062917_create_allergy_catalogs_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062917_create_allergy_catalogs_table.php)
- [database/migrations/2026_04_02_062917_create_disease_catalogs_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062917_create_disease_catalogs_table.php)
- [database/migrations/2026_04_02_062917_create_follow_up_measurements_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062917_create_follow_up_measurements_table.php)
- [database/migrations/2026_04_02_062917_create_plan_adherence_logs_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062917_create_plan_adherence_logs_table.php)
- [database/migrations/2026_04_02_062917_create_report_snapshots_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062917_create_report_snapshots_table.php)
- [database/migrations/2026_04_02_062931_create_role_permissions_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062931_create_role_permissions_table.php)
- [database/migrations/2026_04_02_062931_create_user_roles_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062931_create_user_roles_table.php)
- [database/migrations/2026_04_02_062932_create_meal_ingredients_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062932_create_meal_ingredients_table.php)
- [database/migrations/2026_04_02_062932_create_nutrition_plan_meals_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062932_create_nutrition_plan_meals_table.php)
- [database/migrations/2026_04_02_062932_create_patient_allergies_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062932_create_patient_allergies_table.php)
- [database/migrations/2026_04_02_062932_create_patient_diseases_table.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/database/migrations/2026_04_02_062932_create_patient_diseases_table.php)

### New and updated models

- [app/Models/User.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/User.php)
- [app/Models/AdminProfile.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/AdminProfile.php)
- [app/Models/PatientProfile.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/PatientProfile.php)
- [app/Models/SpecialistProfile.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/SpecialistProfile.php)
- [app/Models/PatientCase.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/PatientCase.php)
- [app/Models/TreatmentProgram.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/TreatmentProgram.php)
- [app/Models/NutritionPlan.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/NutritionPlan.php)
- [app/Models/SportsProgram.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/SportsProgram.php)
- [app/Models/MealTemplate.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/MealTemplate.php)
- [app/Models/Ingredient.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/Ingredient.php)
- [app/Models/PatientPlanAssignment.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/PatientPlanAssignment.php)
- [app/Models/FollowUpReport.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/FollowUpReport.php)
- [app/Models/FollowUpMeasurement.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/FollowUpMeasurement.php)
- [app/Models/PlanAdherenceLog.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/PlanAdherenceLog.php)
- [app/Models/ReportSnapshot.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/ReportSnapshot.php)
- [app/Models/Role.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/Role.php)
- [app/Models/Permission.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/Permission.php)
- [app/Models/DiseaseCatalog.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/DiseaseCatalog.php)
- [app/Models/AllergyCatalog.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/app/Models/AllergyCatalog.php)

### Test file

- [tests/Feature/NutritionDomainSchemaTest.php](/home/seifelden-hamdy/Coding/Web/BackProject-PHP/laravel12/SELF_Projects/feeding/tests/Feature/NutritionDomainSchemaTest.php)

## 10. Current Notes

- The new nutrition domain test is passing.
- During the full test run, unrelated existing application issues also appeared:
  - auth tests redirect to `trainer.home` while default Breeze tests expect `dashboard`
  - profile Blade view has an existing syntax issue in `resources/views/profile/partials/update-profile-information-form.blade.php`

These are application-level issues outside the nutrition schema itself, but they affect the full green test suite.
