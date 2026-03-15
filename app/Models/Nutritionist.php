<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nutritionist extends Model
{
    /**
     * Original Arabic table: الاخصائي_الغذائي
     */
    public $timestamps = false;

    /**
     * Original Arabic columns:
     * رقم الاخصائي, اسم الاخصائي, رقم التواصل, التخصص, الخبرة
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'specialization',
        'experience',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * Original Arabic relation: الاخصائي_الغذائي hasMany الاستفسار
     */
    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    /**
     * Original Arabic relation: الاخصائي_الغذائي hasMany الخطة_الغذائية
     */
    public function nutritionPlans(): HasMany
    {
        return $this->hasMany(NutritionPlan::class);
    }
}
