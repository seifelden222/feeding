<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionPlan extends Model
{
    /**
     * Original Arabic table: الخطة_الغذائية
     */
    public $timestamps = false;

    /**
     * Original Arabic columns:
     * رقم الخطة, اسم الخطة, السعرات_اليومية, عدد_الوجبات, وصف_كل_وجبة, تاريخ_البداية, رقم المستخدم, رقم الاخصائي
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'daily_calories',
        'meals_count',
        'meal_description',
        'start_date',
        'client_id',
        'nutritionist_id',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'daily_calories' => 'decimal:2',
            'meals_count' => 'integer',
            'start_date' => 'date',
            'client_id' => 'integer',
            'nutritionist_id' => 'integer',
        ];
    }

    /**
     * Original Arabic relation: الخطة_الغذائية belongsTo المستخدم
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Original Arabic relation: الخطة_الغذائية belongsTo الاخصائي_الغذائي
     */
    public function nutritionist(): BelongsTo
    {
        return $this->belongsTo(Nutritionist::class);
    }
}
