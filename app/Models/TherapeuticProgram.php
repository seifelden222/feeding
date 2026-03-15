<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TherapeuticProgram extends Model
{
    /**
     * Original Arabic table: برامج_علاجيه
     */
    public $timestamps = false;

    /**
     * Original Arabic columns:
     * رقم البرنامج, اسم البرنامج, نوع البرنامج, عدد_المرات_في_الاسبوع, مدة_التمرين_بالدقائق, رقم المستخدم
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'program_type',
        'sessions_per_week',
        'duration_minutes',
        'client_id',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sessions_per_week' => 'integer',
            'duration_minutes' => 'integer',
            'client_id' => 'integer',
        ];
    }

    /**
     * Original Arabic relation: برامج_علاجيه belongsTo المستخدم
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
