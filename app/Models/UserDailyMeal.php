<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDailyMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'meal_type',
        'calories',
        'protein_g',
        'carb_g',
        'fat_g',
        'notes',
        'image_path',
        'meal_date',
        'consumed_at',
    ];

    protected function casts(): array
    {
        return [
            'meal_date'   => 'date',
            'consumed_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mealTypeLabel(): string
    {
        return match ($this->meal_type) {
            'breakfast' => 'الإفطار',
            'lunch'     => 'الغداء',
            'dinner'    => 'العشاء',
            'snack'     => 'سناك',
            default     => $this->meal_type,
        };
    }
}
