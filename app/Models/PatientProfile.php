<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientProfile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'sex',
        'height_cm',
        'emergency_contact_name',
        'emergency_contact_phone',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'height_cm' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cases(): HasMany
    {
        return $this->hasMany(PatientCase::class, 'patient_user_id', 'user_id');
    }

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(DiseaseCatalog::class, 'patient_diseases', 'patient_user_id', 'disease_id')
            ->withPivot(['diagnosed_at', 'severity', 'notes'])
            ->withTimestamps();
    }

    public function allergies(): BelongsToMany
    {
        return $this->belongsToMany(AllergyCatalog::class, 'patient_allergies', 'patient_user_id', 'allergy_id')
            ->withPivot(['reaction_notes'])
            ->withTimestamps();
    }

    public function followUpReports(): HasMany
    {
        return $this->hasMany(FollowUpReport::class, 'patient_user_id', 'user_id');
    }
}
