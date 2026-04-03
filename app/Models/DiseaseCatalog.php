<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DiseaseCatalog extends Model
{
    use HasFactory;

    protected $table = 'disease_catalog';

    protected $fillable = [
        'name',
        'icd10_code',
    ];

    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(PatientProfile::class, 'patient_diseases', 'disease_id', 'patient_user_id')
            ->withPivot(['diagnosed_at', 'severity', 'notes'])
            ->withTimestamps();
    }
}
