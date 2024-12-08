<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fence extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'new',
        'renovation',
        'additional',
        'change_of_material',
        'repair',
        'others',
    ];
}
