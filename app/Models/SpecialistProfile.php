<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpecialistProfile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'license_number',
        'specialty',
        'years_experience',
    ];

    protected function casts(): array
    {
        return [
            'years_experience' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patientCases(): HasMany
    {
        return $this->hasMany(PatientCase::class, 'specialist_user_id', 'user_id');
    }

    public function treatmentPrograms(): HasMany
    {
        return $this->hasMany(TreatmentProgram::class, 'created_by_specialist_user_id', 'user_id');
    }

    public function nutritionPlans(): HasMany
    {
        return $this->hasMany(NutritionPlan::class, 'created_by_specialist_user_id', 'user_id');
    }

    public function sportsPrograms(): HasMany
    {
        return $this->hasMany(SportsProgram::class, 'created_by_specialist_user_id', 'user_id');
    }
}
