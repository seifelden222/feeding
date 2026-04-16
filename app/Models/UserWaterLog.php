<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWaterLog extends Model
{
    protected $fillable = ['user_id', 'log_date', 'cups'];

    protected function casts(): array
    {
        return ['log_date' => 'date'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
