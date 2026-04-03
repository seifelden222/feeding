<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MealTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meal_type',
        'meal_notes',
        'default_calories',
        'created_by_specialist_user_id',
    ];

    protected function casts(): array
    {
        return [
            'default_calories' => 'integer',
        ];
    }

    public function createdBySpecialist(): BelongsTo
    {
        return $this->belongsTo(SpecialistProfile::class, 'created_by_specialist_user_id', 'user_id');
    }

    public function nutritionPlans(): BelongsToMany
    {
        return $this->belongsToMany(NutritionPlan::class, 'nutrition_plan_meals')
            ->withPivot(['day_of_week', 'sequence_no'])
            ->withTimestamps();
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredients')
            ->withPivot(['quantity', 'preparation_notes'])
            ->withTimestamps();
    }
}
