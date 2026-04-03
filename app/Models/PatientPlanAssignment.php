<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientPlanAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_case_id',
        'treatment_program_id',
        'nutrition_plan_id',
        'sports_program_id',
        'assigned_by_specialist_user_id',
        'assigned_at',
        'effective_from',
        'effective_to',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'assigned_at' => 'datetime',
            'effective_from' => 'date',
            'effective_to' => 'date',
        ];
    }

    public function patientCase(): BelongsTo
    {
        return $this->belongsTo(PatientCase::class);
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

    public function assignedBySpecialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'assigned_by_specialist_user_id', 'user_id');
    }

    public function followUpReports(): HasMany
    {
        return $this->hasMany(FollowUpReport::class, 'assignment_id');
    }

    public function adherenceLogs(): HasMany
    {
        return $this->hasMany(PlanAdherenceLog::class, 'assignment_id');
    }
}
