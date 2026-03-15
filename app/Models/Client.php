<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    /**
     * Original Arabic table: المستخدم
     */
    public $timestamps = false;

    /**
     * Original Arabic columns:
     * رقم المستخدم, اسم المستخدم, السن, العنوان, النوع, الطول, الوزن, قياس السكر
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'age',
        'address',
        'gender',
        'height',
        'weight',
        'blood_sugar_level',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'age' => 'integer',
            'height' => 'decimal:2',
            'weight' => 'decimal:2',
            'blood_sugar_level' => 'decimal:2',
        ];
    }

    /**
     * Original Arabic relation: المستخدم hasMany الاستفسار
     */
    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    /**
     * Original Arabic relation: المستخدم hasMany الخطة_الغذائية
     */
    public function nutritionPlans(): HasMany
    {
        return $this->hasMany(NutritionPlan::class);
    }

    /**
     * Original Arabic relation: المستخدم hasMany برامج_علاجيه
     */
    public function therapeuticPrograms(): HasMany
    {
        return $this->hasMany(TherapeuticProgram::class);
    }

    /**
     * Original Arabic relation: المستخدم hasMany تقارير
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}
