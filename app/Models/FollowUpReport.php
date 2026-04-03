<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FollowUpReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_case_id',
        'assignment_id',
        'patient_user_id',
        'specialist_user_id',
        'treatment_program_id',
        'nutrition_plan_id',
        'sports_program_id',
        'report_date',
        'adherence_score',
        'patient_feedback',
        'specialist_assessment',
        'next_actions',
        'created_by_specialist_user_id',
    ];

    protected function casts(): array
    {
        return [
            'report_date' => 'date',
            'adherence_score' => 'integer',
        ];
    }

    public function patientCase(): BelongsTo
    {
        return $this->belongsTo(PatientCase::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(PatientPlanAssignment::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(PatientProfile::class, 'patient_user_id', 'user_id');
    }

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'specialist_user_id', 'user_id');
    }

    public function treatmentProgram(): BelongsTo
    {
        return $this->belongsTo(TreatmentProgram::class);
    }

    public function nutritionPlan(): BelongsTo
    {
        return $this->belongsTo(NutritionPlan::class);
    }

    public function sportsProgram(): BelongsTo
    {
        return $this->belongsTo(SportsProgram::class);
    }

    public function createdBySpecialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'created_by_specialist_user_id', 'user_id');
    }

    public function measurements(): HasMany
    {
        return $this->hasMany(FollowUpMeasurement::class);
    }

    public function snapshots(): HasMany
    {
        return $this->hasMany(ReportSnapshot::class);
    }
}
