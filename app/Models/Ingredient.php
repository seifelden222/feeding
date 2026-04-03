<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'calories_per_unit',
        'protein_per_unit',
        'carb_per_unit',
        'fat_per_unit',
    ];

    protected function casts(): array
    {
        return [
            'calories_per_unit' => 'decimal:4',
            'protein_per_unit' => 'decimal:4',
            'carb_per_unit' => 'decimal:4',
            'fat_per_unit' => 'decimal:4',
        ];
    }

    public function mealTemplates(): BelongsToMany
    {
        return $this->belongsToMany(MealTemplate::class, 'meal_ingredients')
            ->withPivot(['quantity', 'preparation_notes'])
            ->withTimestamps();
    }
}
