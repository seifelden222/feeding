# 1. Issues in current schema

- `admin` exists only as a generic role idea inside `users`, but not as a clearly separated system actor with its own profile boundary and permission scope.
- `meal_templates.specialist_notes` was previously described as a meal description, which can be misunderstood as ingredient content. Meal text should be guidance/clinical notes only.
- Meals were reusable, but ingredient composition needed to be treated as a first-class normalized structure and not implied by free text.
- `follow_up_reports` depended mainly on `assignment_id`; that is workable, but too implicit for audit, reporting, and permission enforcement. Reports need explicit links to patient, specialist, and nutrition plan.
- The relationship between `treatment_programs`, `nutrition_plans`, and `sports_programs` was conceptually correct, but still too easy to confuse in implementation because the assignment layer did not enforce program-plan consistency.
- Naming was still mixed between broad business terms and implementation terms; a few tables/columns needed more professional clarity.
- Some domain ownership rules were not expressed directly in the schema, especially around who created a report and which care context it belongs to.

# 2. Required changes

- Add `admin_profiles` and treat Admin as a distinct actor, not as a patient/specialist subtype.
- Keep RBAC, but make Admin a first-class role with full user-management permissions.
- Rename meal free-text semantics to `meal_notes` and define it as specialist guidance only.
- Keep `meal_ingredients` as a normalized junction table between meals and ingredients.
- Rename `cases` to `patient_cases` for clarity.
- Keep `treatment_programs` as the clinical umbrella, with `nutrition_plans` and `sports_programs` as separate child program components.
- Strengthen `patient_plan_assignments` so it is the execution layer for one patient case, one nutrition plan, and optionally one sports program.
- Strengthen `follow_up_reports` with direct foreign keys to `patient_cases`, `patient_profiles`, `specialist_profiles`, `nutrition_plans`, and `patient_plan_assignments`.
- Keep reports stored as transactional follow-up records; generate dashboards and summaries dynamically; store immutable snapshots only when needed.
- Remove vague naming such as generic description semantics and use professional English field names.

# 3. Updated tables and fields

## Identity and access

- `users`
  - `id`
  - `email`
  - `password_hash`
  - `phone`
  - `status`
  - `created_at`
  - `updated_at`

- `roles`
  - `id`
  - `name`

- `permissions`
  - `id`
  - `code`

- `user_roles`
  - `user_id`
  - `role_id`

- `role_permissions`
  - `role_id`
  - `permission_id`

- `admin_profiles`
  - `user_id`
  - `display_name`
  - `is_super_admin`

- `patient_profiles`
  - `user_id`
  - `date_of_birth`
  - `sex`
  - `height_cm`
  - `emergency_contact_name`
  - `emergency_contact_phone`

- `specialist_profiles`
  - `user_id`
  - `license_number`
  - `specialty`
  - `years_experience`

## Care structure

- `patient_cases`
  - `id`
  - `patient_user_id`
  - `specialist_user_id`
  - `status`
  - `opened_at`
  - `closed_at`

- `treatment_programs`
  - `id`
  - `patient_case_id`
  - `title`
  - `clinical_objective`
  - `start_date`
  - `end_date`
  - `status`
  - `created_by_specialist_user_id`
  - `created_at`
  - `updated_at`

- `nutrition_plans`
  - `id`
  - `treatment_program_id`
  - `title`
  - `daily_calorie_target`
  - `protein_g`
  - `carb_g`
  - `fat_g`
  - `plan_notes`
  - `status`
  - `created_by_specialist_user_id`
  - `created_at`
  - `updated_at`

- `sports_programs`
  - `id`
  - `treatment_program_id`
  - `title`
  - `frequency_per_week`
  - `intensity_level`
  - `program_notes`
  - `status`
  - `created_by_specialist_user_id`
  - `created_at`
  - `updated_at`

## Meals

- `meal_templates`
  - `id`
  - `name`
  - `meal_type`
  - `meal_notes`
  - `default_calories`
  - `created_by_specialist_user_id`

- `ingredients`
  - `id`
  - `name`
  - `unit`
  - `calories_per_unit`
  - `protein_per_unit`
  - `carb_per_unit`
  - `fat_per_unit`

- `meal_ingredients`
  - `meal_template_id`
  - `ingredient_id`
  - `quantity`
  - `preparation_notes`

- `nutrition_plan_meals`
  - `id`
  - `nutrition_plan_id`
  - `meal_template_id`
  - `day_of_week`
  - `sequence_no`

## Patient condition catalogs

- `disease_catalog`
  - `id`
  - `name`
  - `icd10_code`

- `allergy_catalog`
  - `id`
  - `name`

- `patient_diseases`
  - `patient_user_id`
  - `disease_id`
  - `diagnosed_at`
  - `severity`
  - `notes`

- `patient_allergies`
  - `patient_user_id`
  - `allergy_id`
  - `reaction_notes`

## Execution and follow-up

- `patient_plan_assignments`
  - `id`
  - `patient_case_id`
  - `treatment_program_id`
  - `nutrition_plan_id`
  - `sports_program_id`
  - `assigned_by_specialist_user_id`
  - `assigned_at`
  - `effective_from`
  - `effective_to`
  - `status`

- `follow_up_reports`
  - `id`
  - `patient_case_id`
  - `assignment_id`
  - `patient_user_id`
  - `specialist_user_id`
  - `treatment_program_id`
  - `nutrition_plan_id`
  - `sports_program_id`
  - `report_date`
  - `adherence_score`
  - `patient_feedback`
  - `specialist_assessment`
  - `next_actions`
  - `created_by_specialist_user_id`
  - `created_at`

- `follow_up_measurements`
  - `id`
  - `follow_up_report_id`
  - `weight_kg`
  - `body_fat_percent`
  - `waist_cm`
  - `blood_glucose_mg_dl`
  - `blood_pressure_systolic`
  - `blood_pressure_diastolic`

- `plan_adherence_logs`
  - `id`
  - `assignment_id`
  - `log_date`
  - `adherence_score`
  - `notes`
  - `created_by_user_id`

- `report_snapshots`
  - `id`
  - `follow_up_report_id`
  - `snapshot_json`
  - `snapshot_hash`
  - `created_at`

# 4. Updated relationships

- `users` to `admin_profiles`: one-to-zero-or-one.
- `users` to `patient_profiles`: one-to-zero-or-one.
- `users` to `specialist_profiles`: one-to-zero-or-one.
- `users` to `roles`: many-to-many through `user_roles`.
- `roles` to `permissions`: many-to-many through `role_permissions`.
- `patient_profiles` to `patient_cases`: one-to-many.
- `specialist_profiles` to `patient_cases`: one-to-many.
- `patient_cases` to `treatment_programs`: one-to-many.
- `treatment_programs` to `nutrition_plans`: one-to-many.
- `treatment_programs` to `sports_programs`: one-to-many.
- `nutrition_plans` to `nutrition_plan_meals`: one-to-many.
- `meal_templates` to `nutrition_plan_meals`: one-to-many.
- `meal_templates` to `ingredients`: many-to-many through `meal_ingredients`.
- `patient_cases` to `patient_plan_assignments`: one-to-many.
- `treatment_programs` to `patient_plan_assignments`: one-to-many.
- `nutrition_plans` to `patient_plan_assignments`: one-to-many.
- `sports_programs` to `patient_plan_assignments`: one-to-many, optional on assignment.
- `patient_plan_assignments` to `follow_up_reports`: one-to-many.
- `follow_up_reports` to `follow_up_measurements`: one-to-many.
- `follow_up_reports` to `report_snapshots`: one-to-many, optional.

Relationship rule that fixes the model:

- Every `nutrition_plan` belongs to exactly one `treatment_program`.
- Every `sports_program` belongs to exactly one `treatment_program`.
- Every `patient_plan_assignment` must point to one `patient_case` and one `treatment_program`.
- The assigned `nutrition_plan` must belong to the same `treatment_program` stored on the assignment.
- If `sports_program_id` is present, it must also belong to that same `treatment_program`.
- Every `follow_up_report` must reference the assignment and repeat the main care keys needed for audit and analytics.

# 5. Role/permission model

## Roles

- `admin`
- `specialist`
- `patient`

## Admin model

- Admin is not mixed with patient or specialist domain profiles.
- Admin has an account in `users`, a role in `user_roles`, and an optional profile row in `admin_profiles`.
- Admin does not appear in `patient_profiles` or `specialist_profiles` unless the business explicitly supports dual-role staff and that is approved later.

## Core permissions

- `admin`
  - `users.create`
  - `users.update`
  - `users.delete`
  - `roles.assign`
  - `permissions.manage`
  - `cases.read_all`
  - `programs.read_all`
  - `reports.read_all`

- `specialist`
  - `patients.read_assigned`
  - `cases.create`
  - `cases.update_assigned`
  - `treatment_programs.create`
  - `treatment_programs.update`
  - `nutrition_plans.create`
  - `nutrition_plans.update`
  - `sports_programs.create`
  - `sports_programs.update`
  - `assignments.create`
  - `assignments.update`
  - `reports.create`
  - `reports.read_assigned`

- `patient`
  - `profile.read_self`
  - `profile.update_self`
  - `plans.read_self`
  - `reports.read_self`
  - `adherence_logs.create_self`

# 6. ERD (text)

```text
users (1) --- (0..1) admin_profiles
users (1) --- (0..1) patient_profiles
users (1) --- (0..1) specialist_profiles
users (M) --- (M) roles via user_roles
roles (M) --- (M) permissions via role_permissions

patient_profiles (1) --- (M) patient_cases
specialist_profiles (1) --- (M) patient_cases

patient_profiles (M) --- (M) disease_catalog via patient_diseases
patient_profiles (M) --- (M) allergy_catalog via patient_allergies

patient_cases (1) --- (M) treatment_programs
treatment_programs (1) --- (M) nutrition_plans
treatment_programs (1) --- (M) sports_programs

nutrition_plans (1) --- (M) nutrition_plan_meals
meal_templates (1) --- (M) nutrition_plan_meals
meal_templates (M) --- (M) ingredients via meal_ingredients

patient_cases (1) --- (M) patient_plan_assignments
treatment_programs (1) --- (M) patient_plan_assignments
nutrition_plans (1) --- (M) patient_plan_assignments
sports_programs (0..1) --- (M) patient_plan_assignments

patient_plan_assignments (1) --- (M) follow_up_reports
follow_up_reports (1) --- (M) follow_up_measurements
follow_up_reports (1) --- (0..M) report_snapshots
patient_plan_assignments (1) --- (M) plan_adherence_logs
```

# 7. SQL schema (or migration changes)

```sql
-- Production-oriented PostgreSQL-style SQL
-- This is a modification of the current design, not a full rebuild.

CREATE TABLE users (
    id BIGSERIAL PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone VARCHAR(30),
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE roles (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE permissions (
    id BIGSERIAL PRIMARY KEY,
    code VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE user_roles (
    user_id BIGINT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    role_id BIGINT NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
    PRIMARY KEY (user_id, role_id)
);

CREATE TABLE role_permissions (
    role_id BIGINT NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
    permission_id BIGINT NOT NULL REFERENCES permissions(id) ON DELETE CASCADE,
    PRIMARY KEY (role_id, permission_id)
);

CREATE TABLE admin_profiles (
    user_id BIGINT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
    display_name VARCHAR(150) NOT NULL,
    is_super_admin BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE patient_profiles (
    user_id BIGINT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
    date_of_birth DATE,
    sex VARCHAR(20),
    height_cm NUMERIC(5,2),
    emergency_contact_name VARCHAR(150),
    emergency_contact_phone VARCHAR(30)
);

CREATE TABLE specialist_profiles (
    user_id BIGINT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
    license_number VARCHAR(100) NOT NULL UNIQUE,
    specialty VARCHAR(100),
    years_experience INT
);

CREATE TABLE patient_cases (
    id BIGSERIAL PRIMARY KEY,
    patient_user_id BIGINT NOT NULL REFERENCES patient_profiles(user_id) ON DELETE RESTRICT,
    specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    status VARCHAR(20) NOT NULL DEFAULT 'open',
    opened_at TIMESTAMP NOT NULL DEFAULT NOW(),
    closed_at TIMESTAMP
);

CREATE TABLE disease_catalog (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(150) NOT NULL UNIQUE,
    icd10_code VARCHAR(20)
);

CREATE TABLE allergy_catalog (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(150) NOT NULL UNIQUE
);

CREATE TABLE patient_diseases (
    patient_user_id BIGINT NOT NULL REFERENCES patient_profiles(user_id) ON DELETE CASCADE,
    disease_id BIGINT NOT NULL REFERENCES disease_catalog(id) ON DELETE RESTRICT,
    diagnosed_at DATE,
    severity VARCHAR(20),
    notes TEXT,
    PRIMARY KEY (patient_user_id, disease_id)
);

CREATE TABLE patient_allergies (
    patient_user_id BIGINT NOT NULL REFERENCES patient_profiles(user_id) ON DELETE CASCADE,
    allergy_id BIGINT NOT NULL REFERENCES allergy_catalog(id) ON DELETE RESTRICT,
    reaction_notes TEXT,
    PRIMARY KEY (patient_user_id, allergy_id)
);

CREATE TABLE treatment_programs (
    id BIGSERIAL PRIMARY KEY,
    patient_case_id BIGINT NOT NULL REFERENCES patient_cases(id) ON DELETE CASCADE,
    title VARCHAR(200) NOT NULL,
    clinical_objective TEXT,
    start_date DATE,
    end_date DATE,
    status VARCHAR(20) NOT NULL DEFAULT 'draft',
    created_by_specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE nutrition_plans (
    id BIGSERIAL PRIMARY KEY,
    treatment_program_id BIGINT NOT NULL REFERENCES treatment_programs(id) ON DELETE CASCADE,
    title VARCHAR(200) NOT NULL,
    daily_calorie_target INT,
    protein_g NUMERIC(8,2),
    carb_g NUMERIC(8,2),
    fat_g NUMERIC(8,2),
    plan_notes TEXT,
    status VARCHAR(20) NOT NULL DEFAULT 'draft',
    created_by_specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE sports_programs (
    id BIGSERIAL PRIMARY KEY,
    treatment_program_id BIGINT NOT NULL REFERENCES treatment_programs(id) ON DELETE CASCADE,
    title VARCHAR(200) NOT NULL,
    frequency_per_week INT,
    intensity_level VARCHAR(30),
    program_notes TEXT,
    status VARCHAR(20) NOT NULL DEFAULT 'draft',
    created_by_specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE meal_templates (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    meal_type VARCHAR(30) NOT NULL,
    meal_notes TEXT,
    default_calories INT,
    created_by_specialist_user_id BIGINT REFERENCES specialist_profiles(user_id) ON DELETE SET NULL
);

CREATE TABLE ingredients (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(200) NOT NULL UNIQUE,
    unit VARCHAR(20) NOT NULL,
    calories_per_unit NUMERIC(10,4),
    protein_per_unit NUMERIC(10,4),
    carb_per_unit NUMERIC(10,4),
    fat_per_unit NUMERIC(10,4)
);

CREATE TABLE meal_ingredients (
    meal_template_id BIGINT NOT NULL REFERENCES meal_templates(id) ON DELETE CASCADE,
    ingredient_id BIGINT NOT NULL REFERENCES ingredients(id) ON DELETE RESTRICT,
    quantity NUMERIC(10,3) NOT NULL,
    preparation_notes TEXT,
    PRIMARY KEY (meal_template_id, ingredient_id)
);

CREATE TABLE nutrition_plan_meals (
    id BIGSERIAL PRIMARY KEY,
    nutrition_plan_id BIGINT NOT NULL REFERENCES nutrition_plans(id) ON DELETE CASCADE,
    meal_template_id BIGINT NOT NULL REFERENCES meal_templates(id) ON DELETE RESTRICT,
    day_of_week SMALLINT,
    sequence_no SMALLINT NOT NULL DEFAULT 1,
    UNIQUE (nutrition_plan_id, day_of_week, sequence_no)
);

CREATE TABLE patient_plan_assignments (
    id BIGSERIAL PRIMARY KEY,
    patient_case_id BIGINT NOT NULL REFERENCES patient_cases(id) ON DELETE CASCADE,
    treatment_program_id BIGINT NOT NULL REFERENCES treatment_programs(id) ON DELETE RESTRICT,
    nutrition_plan_id BIGINT NOT NULL REFERENCES nutrition_plans(id) ON DELETE RESTRICT,
    sports_program_id BIGINT REFERENCES sports_programs(id) ON DELETE SET NULL,
    assigned_by_specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    assigned_at TIMESTAMP NOT NULL DEFAULT NOW(),
    effective_from DATE NOT NULL,
    effective_to DATE,
    status VARCHAR(20) NOT NULL DEFAULT 'active'
);

CREATE TABLE follow_up_reports (
    id BIGSERIAL PRIMARY KEY,
    patient_case_id BIGINT NOT NULL REFERENCES patient_cases(id) ON DELETE CASCADE,
    assignment_id BIGINT NOT NULL REFERENCES patient_plan_assignments(id) ON DELETE CASCADE,
    patient_user_id BIGINT NOT NULL REFERENCES patient_profiles(user_id) ON DELETE RESTRICT,
    specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    treatment_program_id BIGINT NOT NULL REFERENCES treatment_programs(id) ON DELETE RESTRICT,
    nutrition_plan_id BIGINT NOT NULL REFERENCES nutrition_plans(id) ON DELETE RESTRICT,
    sports_program_id BIGINT REFERENCES sports_programs(id) ON DELETE SET NULL,
    report_date DATE NOT NULL,
    adherence_score SMALLINT CHECK (adherence_score BETWEEN 0 AND 100),
    patient_feedback TEXT,
    specialist_assessment TEXT,
    next_actions TEXT,
    created_by_specialist_user_id BIGINT NOT NULL REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE follow_up_measurements (
    id BIGSERIAL PRIMARY KEY,
    follow_up_report_id BIGINT NOT NULL REFERENCES follow_up_reports(id) ON DELETE CASCADE,
    weight_kg NUMERIC(6,2),
    body_fat_percent NUMERIC(5,2),
    waist_cm NUMERIC(6,2),
    blood_glucose_mg_dl NUMERIC(6,2),
    blood_pressure_systolic SMALLINT,
    blood_pressure_diastolic SMALLINT
);

CREATE TABLE plan_adherence_logs (
    id BIGSERIAL PRIMARY KEY,
    assignment_id BIGINT NOT NULL REFERENCES patient_plan_assignments(id) ON DELETE CASCADE,
    log_date DATE NOT NULL,
    adherence_score SMALLINT CHECK (adherence_score BETWEEN 0 AND 100),
    notes TEXT,
    created_by_user_id BIGINT NOT NULL REFERENCES users(id) ON DELETE RESTRICT
);

CREATE TABLE report_snapshots (
    id BIGSERIAL PRIMARY KEY,
    follow_up_report_id BIGINT NOT NULL REFERENCES follow_up_reports(id) ON DELETE CASCADE,
    snapshot_json JSONB NOT NULL,
    snapshot_hash VARCHAR(128) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE INDEX idx_patient_cases_patient ON patient_cases(patient_user_id);
CREATE INDEX idx_patient_cases_specialist ON patient_cases(specialist_user_id);
CREATE INDEX idx_treatment_programs_case ON treatment_programs(patient_case_id);
CREATE INDEX idx_nutrition_plans_program ON nutrition_plans(treatment_program_id);
CREATE INDEX idx_sports_programs_program ON sports_programs(treatment_program_id);
CREATE INDEX idx_assignments_case_status ON patient_plan_assignments(patient_case_id, status);
CREATE INDEX idx_assignments_program ON patient_plan_assignments(treatment_program_id, nutrition_plan_id, sports_program_id);
CREATE INDEX idx_followup_assignment_date ON follow_up_reports(assignment_id, report_date);
CREATE INDEX idx_followup_patient_date ON follow_up_reports(patient_user_id, report_date);

-- Recommended integrity rules at application/service layer or database trigger layer:
-- 1. patient_plan_assignments.treatment_program_id must match nutrition_plans.treatment_program_id
-- 2. if sports_program_id is not null, it must belong to the same treatment_program_id
-- 3. follow_up_reports patient/specialist/program keys must match the linked assignment and case
```

# 8. Notes (short)

- `treatment_programs` is the umbrella clinical strategy.
- `nutrition_plans` is the dietary prescription.
- `sports_programs` is the physical activity prescription.
- `patient_plan_assignments` is the operational link that applies plan/program versions to one patient case over time.
- `follow_up_reports` should be stored as structured records; dashboard summaries should be generated dynamically; `report_snapshots` should be used only for immutable exports or audit history.
