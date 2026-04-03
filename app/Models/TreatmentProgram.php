<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TreatmentProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_case_id',
        'title',
        'clinical_objective',
        'start_date',
        'end_date',
        'status',
        'created_by_specialist_user_id',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function patientCase(): BelongsTo
    {
        return $this->belongsTo(PatientCase::class);
    }

    public function createdBySpecialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'created_by_specialist_user_id', 'user_id');
    }

    public function nutritionPlans(): HasMany
    {
        return $this->hasMany(NutritionPlan::class);
    }

    public function sportsPrograms(): HasMany
    {
        return $this->hasMany(SportsProgram::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(PatientPlanAssignment::class);
    }
}
