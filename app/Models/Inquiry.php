<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    /**
     * Original Arabic table: الاستفسار
     */
    public $timestamps = false;

    /**
     * Original Arabic columns:
     * رقم الاستفسار, التاريخ, محتوى_السؤال, الرد, الحالة, رقم المستخدم, رقم الاخصائي
     *
     * @var list<string>
     */
    protected $fillable = [
        'inquiry_date',
        'question_content',
        'reply',
        'status',
        'client_id',
        'nutritionist_id',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'inquiry_date' => 'date',
            'client_id' => 'integer',
            'nutritionist_id' => 'integer',
        ];
    }

    /**
     * Original Arabic relation: الاستفسار belongsTo المستخدم
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Original Arabic relation: الاستفسار belongsTo الاخصائي_الغذائي
     */
    public function nutritionist(): BelongsTo
    {
        return $this->belongsTo(Nutritionist::class);
    }
}
