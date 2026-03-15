<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    /**
     * Original Arabic table: تقارير
     */
    public $timestamps = false;

    /**
     * Original Arabic columns:
     * رقم التقرير, التاريخ, الوزن_الحالي, ملاحظات, رقم المستخدم
     *
     * @var list<string>
     */
    protected $fillable = [
        'report_date',
        'current_weight',
        'notes',
        'client_id',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'report_date' => 'date',
            'current_weight' => 'decimal:2',
            'client_id' => 'integer',
        ];
    }

    /**
     * Original Arabic relation: تقارير belongsTo المستخدم
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
