<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanAdherenceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'log_date',
        'adherence_score',
        'notes',
        'created_by_user_id',
    ];

    protected function casts(): array
    {
        return [
            'log_date' => 'date',
            'adherence_score' => 'integer',
        ];
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(PatientPlanAssignment::class);
    }

    public function createdByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
