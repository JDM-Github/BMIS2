<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementsInMeters extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'length',
        'height',
        'excess'
    ];
}
