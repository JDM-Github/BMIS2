<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessPermit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'proprietor',
        'permit_number',
        'address',
        'business_location',
        'status',
        'user_id',
        'request_document_id'
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
