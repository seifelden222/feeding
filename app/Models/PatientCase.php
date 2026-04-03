<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_user_id',
        'specialist_user_id',
        'status',
        'opened_at',
        'closed_at',
    ];

    protected function casts(): array
    {
        return [
            'opened_at' => 'datetime',
            'closed_at' => 'datetime',
        ];
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(PatientProfile::class, 'patient_user_id', 'user_id');
    }

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'specialist_user_id', 'user_id');
    }

    public function treatmentPrograms(): HasMany
    {
        return $this->hasMany(TreatmentProgram::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(PatientPlanAssignment::class);
    }

    public function followUpReports(): HasMany
    {
        return $this->hasMany(FollowUpReport::class);
    }
}
