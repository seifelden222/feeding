<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FollowUpMeasurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'follow_up_report_id',
        'weight_kg',
        'body_fat_percent',
        'waist_cm',
        'blood_glucose_mg_dl',
        'blood_pressure_systolic',
        'blood_pressure_diastolic',
    ];

    protected function casts(): array
    {
        return [
            'weight_kg' => 'decimal:2',
            'body_fat_percent' => 'decimal:2',
            'waist_cm' => 'decimal:2',
            'blood_glucose_mg_dl' => 'decimal:2',
            'blood_pressure_systolic' => 'integer',
            'blood_pressure_diastolic' => 'integer',
        ];
    }

    public function followUpReport(): BelongsTo
    {
        return $this->belongsTo(FollowUpReport::class);
    }
}
