<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportSnapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'follow_up_report_id',
        'snapshot_json',
        'snapshot_hash',
    ];

    protected function casts(): array
    {
        return [
            'snapshot_json' => 'array',
        ];
    }

    public function followUpReport(): BelongsTo
    {
        return $this->belongsTo(FollowUpReport::class);
    }
}
