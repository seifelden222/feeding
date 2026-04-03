<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AllergyCatalog extends Model
{
    use HasFactory;

    protected $table = 'allergy_catalog';

    protected $fillable = [
        'name',
    ];

    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(PatientProfile::class, 'patient_allergies', 'allergy_id', 'patient_user_id')
            ->withPivot(['reaction_notes'])
            ->withTimestamps();
    }
}
