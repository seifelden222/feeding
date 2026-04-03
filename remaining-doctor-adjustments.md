### 1. Remaining issues to solve

- Specialist notes are still too broadly implied and need clear ownership by business level.
- Reports are modeled as stored follow-up records, but the distinction between stored transactional data and generated report output is not yet explicit enough.
- Nutrition plan change-over-time needs a practical lifecycle model beyond simple status fields.
- The business meaning of `Nutrition Plan`, `Treatment Program`, and `Sports Program` needs to be made explicit in the schema, not only in prose.
- Patient-specific professional cautions and practical hints are still missing as a dedicated structure.
- Consultation/inquiry was mentioned in the original workflow and needs a minimal proper schema if it belongs to specialist operations.

### 2. Business decisions taken for each issue

- Notes will be stored at four business levels, each for a different purpose:
  - `meal_templates.meal_notes`: reusable meal-level guidance
  - `nutrition_plans.plan_notes`: reusable plan-level clinical nutrition guidance
  - `patient_cases.case_notes`: long-lived case-level clinical context
  - `patient_plan_assignments.assignment_notes`: patient-specific active execution notes
- Patient-specific cautions will not be mixed into structured allergies. They will be stored in a dedicated specialist-owned table because they may include temporary or judgment-based advice.
- Reports will be split conceptually into:
  - stored transactional follow-up data
  - generated report views/documents
- Stored data should include measurements, adherence, assessments, and actions. Printed/displayed reports should be generated dynamically from those records. Snapshots should only be stored when an immutable export is required.
- Plan history will be handled using a combined approach:
  - reusable plan versions
  - assignment history
  - clear lifecycle statuses
- `Treatment Program` will remain the therapeutic umbrella.
- `Nutrition Plan` will be the versioned dietary protocol under a treatment program.
- `Sports Program` will be the physical activity protocol under a treatment program.
- Consultation/inquiry belongs to the workflow, but should be minimal and operational, not overloaded into clinical reporting.

### 3. Exact schema changes required

- Add `case_notes` to `patient_cases`.
- Add `assignment_notes`, `replaced_by_assignment_id`, and `ended_reason` to `patient_plan_assignments`.
- Add versioning fields to `nutrition_plans`:
  - `plan_code`
  - `version_no`
  - `previous_plan_id`
  - `superseded_at`
  - `archived_at`
- Add business classification to `treatment_programs`:
  - `program_category`
- Add patient-specific caution table:
  - `patient_cautions`
- Clarify report generation by extending snapshot metadata:
  - `report_snapshots.generated_from_report_id`
  - `report_snapshots.snapshot_type`
- Add a minimal specialist consultation structure:
  - `consultations`

### 4. New or updated tables and fields

#### Updated `patient_cases`

- add `case_notes` TEXT NULL

Use for:

- long-term patient case context
- specialist summary of the case
- case-level observations that should survive plan replacement

#### Updated `patient_plan_assignments`

- add `assignment_notes` TEXT NULL
- add `replaced_by_assignment_id` BIGINT NULL
- add `ended_reason` VARCHAR(100) NULL

Use for:

- patient-specific active cautions
- temporary execution hints
- why an assignment ended or was replaced

#### Updated `nutrition_plans`

- add `plan_code` VARCHAR(100) NOT NULL
- add `version_no` INT NOT NULL DEFAULT 1
- add `previous_plan_id` BIGINT NULL
- add `superseded_at` TIMESTAMP NULL
- add `archived_at` TIMESTAMP NULL

Use for:

- versioned reusable nutrition plans
- explicit plan evolution over time
- traceable replacement chain

Recommended uniqueness:

- unique (`plan_code`, `version_no`)

#### Updated `treatment_programs`

- add `program_category` VARCHAR(50) NOT NULL DEFAULT 'nutrition_management'

Use for:

- business classification of the therapeutic umbrella
- future extensibility beyond nutrition-only cases

#### New `patient_cautions`

- `id`
- `patient_case_id`
- `assignment_id` NULL
- `patient_user_id`
- `specialist_user_id`
- `caution_type`
- `title`
- `details`
- `severity`
- `is_active`
- `starts_at`
- `ends_at`
- `created_by_specialist_user_id`
- timestamps

Examples:

- allergy caution
- lactose intolerance reminder
- reduce carbs for this patient
- increase protein focus
- monitor glucose response after dinner

Business rule:

- if the caution is long-lived, store it at case level
- if it is tied to the current plan execution, also link it to `assignment_id`

#### Updated `report_snapshots`

- add `generated_from_report_id` BIGINT NULL
- add `snapshot_type` VARCHAR(50) NOT NULL DEFAULT 'follow_up_summary'

Use for:

- immutable exports
- printed report archive
- generated summaries stored only when needed

#### New `consultations`

- `id`
- `patient_case_id`
- `patient_user_id`
- `specialist_user_id` NULL
- `submitted_by_user_id`
- `consultation_type`
- `subject`
- `question_content`
- `response_content` NULL
- `status`
- `opened_at`
- `responded_at` NULL
- `closed_at` NULL
- timestamps

Use for:

- patient inquiry
- specialist consultation thread
- pre-follow-up question

This should stay separate from `follow_up_reports` because consultation is a communication workflow, not a clinical progress record.

### 5. Relationship updates

- `patient_cases` 1:M `patient_cautions`
- `patient_plan_assignments` 0..1:M `patient_cautions`
- `nutrition_plans` self-reference through `previous_plan_id`
- `patient_plan_assignments` self-reference through `replaced_by_assignment_id`
- `patient_cases` 1:M `consultations`
- `patient_profiles` 1:M `consultations`
- `specialist_profiles` 0..1:M `consultations`
- `follow_up_reports` 1:M `report_snapshots`
- `report_snapshots.generated_from_report_id` keeps explicit trace to the stored transactional follow-up record used to build the generated output

Business meaning after update:

- `Treatment Program`: therapeutic case umbrella and care objective
- `Nutrition Plan`: versioned dietary protocol definition
- `Sports Program`: physical activity protocol definition
- `Patient Plan Assignment`: the real patient-specific active application of those protocols
- `Follow-up Report`: stored specialist follow-up transaction
- `Generated Report Snapshot`: optional immutable output created from stored follow-up and assignment data

### 6. SQL migration changes

```sql
ALTER TABLE patient_cases
ADD COLUMN case_notes TEXT NULL;

ALTER TABLE treatment_programs
ADD COLUMN program_category VARCHAR(50) NOT NULL DEFAULT 'nutrition_management';

ALTER TABLE nutrition_plans
ADD COLUMN plan_code VARCHAR(100) NOT NULL,
ADD COLUMN version_no INT NOT NULL DEFAULT 1,
ADD COLUMN previous_plan_id BIGINT NULL,
ADD COLUMN superseded_at TIMESTAMP NULL,
ADD COLUMN archived_at TIMESTAMP NULL,
ADD CONSTRAINT nutrition_plans_previous_plan_id_foreign
    FOREIGN KEY (previous_plan_id) REFERENCES nutrition_plans(id) ON DELETE SET NULL,
ADD CONSTRAINT nutrition_plans_plan_code_version_no_unique
    UNIQUE (plan_code, version_no);

ALTER TABLE patient_plan_assignments
ADD COLUMN assignment_notes TEXT NULL,
ADD COLUMN replaced_by_assignment_id BIGINT NULL,
ADD COLUMN ended_reason VARCHAR(100) NULL,
ADD CONSTRAINT patient_plan_assignments_replaced_by_assignment_id_foreign
    FOREIGN KEY (replaced_by_assignment_id) REFERENCES patient_plan_assignments(id) ON DELETE SET NULL;

ALTER TABLE report_snapshots
ADD COLUMN generated_from_report_id BIGINT NULL,
ADD COLUMN snapshot_type VARCHAR(50) NOT NULL DEFAULT 'follow_up_summary',
ADD CONSTRAINT report_snapshots_generated_from_report_id_foreign
    FOREIGN KEY (generated_from_report_id) REFERENCES follow_up_reports(id) ON DELETE SET NULL;

CREATE TABLE patient_cautions (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    patient_case_id BIGINT NOT NULL,
    assignment_id BIGINT NULL,
    patient_user_id BIGINT NOT NULL,
    specialist_user_id BIGINT NOT NULL,
    caution_type VARCHAR(50) NOT NULL,
    title VARCHAR(200) NOT NULL,
    details TEXT NULL,
    severity VARCHAR(20) NOT NULL DEFAULT 'medium',
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    starts_at TIMESTAMP NULL,
    ends_at TIMESTAMP NULL,
    created_by_specialist_user_id BIGINT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_case_id) REFERENCES patient_cases(id) ON DELETE CASCADE,
    FOREIGN KEY (assignment_id) REFERENCES patient_plan_assignments(id) ON DELETE SET NULL,
    FOREIGN KEY (patient_user_id) REFERENCES patient_profiles(user_id) ON DELETE RESTRICT,
    FOREIGN KEY (specialist_user_id) REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT,
    FOREIGN KEY (created_by_specialist_user_id) REFERENCES specialist_profiles(user_id) ON DELETE RESTRICT
);

CREATE TABLE consultations (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    patient_case_id BIGINT NOT NULL,
    patient_user_id BIGINT NOT NULL,
    specialist_user_id BIGINT NULL,
    submitted_by_user_id BIGINT NOT NULL,
    consultation_type VARCHAR(50) NOT NULL DEFAULT 'inquiry',
    subject VARCHAR(200) NOT NULL,
    question_content TEXT NOT NULL,
    response_content TEXT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'open',
    opened_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    responded_at TIMESTAMP NULL,
    closed_at TIMESTAMP NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_case_id) REFERENCES patient_cases(id) ON DELETE CASCADE,
    FOREIGN KEY (patient_user_id) REFERENCES patient_profiles(user_id) ON DELETE RESTRICT,
    FOREIGN KEY (specialist_user_id) REFERENCES specialist_profiles(user_id) ON DELETE SET NULL,
    FOREIGN KEY (submitted_by_user_id) REFERENCES users(id) ON DELETE RESTRICT
);
```

### 7. Short explanation of why each change was needed

- `case_notes` was needed because some specialist notes belong to the whole case, not to one meal or one plan.
- `assignment_notes` was needed because some cautions are specific to the patient’s currently active plan execution.
- nutrition plan versioning was needed because specialists may change plans over time and that change must remain traceable.
- assignment replacement tracking was needed because business history is not only about plan templates, but also about what was actually applied to the patient.
- `program_category` was needed to make the business role of the treatment program explicit instead of leaving it as a vague parent record.
- `patient_cautions` was needed because practical clinical hints are not the same as structured allergy or disease records.
- report snapshot metadata was needed to separate stored transactional follow-up from generated printable/displayable output.
- `consultations` was needed because inquiry is part of operational specialist workflow, but it should remain separate from formal clinical follow-up records.
