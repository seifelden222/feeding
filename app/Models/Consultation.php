<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Consultation extends Model
{
    protected $fillable = [
        'trainer_id',
        'client_name',
        'consultation_type',
        'status',
        'room_code',
        'scheduled_at',
        'joined_at',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'joined_at'    => 'datetime',
            'approved_at'  => 'datetime',
        ];
    }

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public static function generateRoomCode(): string
    {
        return 'nutrizone-' . Str::random(10);
    }

    public function typeLabel(): string
    {
        return match ($this->consultation_type) {
            'initial'   => 'استشارة أولية',
            'followup'  => 'متابعة أسبوعية',
            'plan_edit' => 'تعديل خطة',
            default     => $this->consultation_type,
        };
    }
}
