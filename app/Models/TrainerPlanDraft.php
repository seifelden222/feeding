<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainerPlanDraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_user_id',
        'payload',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
        ];
    }

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'trainer_user_id');
    }
}
