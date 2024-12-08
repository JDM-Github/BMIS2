<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaranggayClearance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'request_document_id',
        'is_certified',
        'purpose',
        'valid_until',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function requestDocument(): BelongsTo
    {
        return $this->belongsTo(RequestDocument::class);
    }
}
