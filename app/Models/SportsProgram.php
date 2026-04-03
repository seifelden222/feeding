<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SportsProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'treatment_program_id',
        'title',
        'frequency_per_week',
        'intensity_level',
        'program_notes',
        'status',
        'created_by_specialist_user_id',
    ];

    protected function casts(): array
    {
        return [
            'frequency_per_week' => 'integer',
        ];
    }

    public function treatmentProgram(): BelongsTo
    {
        return $this->belongsTo(TreatmentProgram::class);
    }

    public function createdBySpecialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'created_by_specialist_user_id', 'user_id');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(PatientPlanAssignment::class);
    }
}
