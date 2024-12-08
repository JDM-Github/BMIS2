<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalLegalCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_facility',
        'medical_conditions',
        'start_date',
        'end_date',
        'time_of_arrival',
        'brought_by',
        'relationship',
        'start',
        'end',
        'user_id',
        'request_document_id',
        'address'
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
