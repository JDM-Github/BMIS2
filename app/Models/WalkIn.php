<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'contact_number',
        'document_type',
        'purpose_of_request',
        'isArchived'
    ];
}
