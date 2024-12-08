<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfFencing extends Model
{
    use HasFactory;

    protected $fillable = [
        'indineous',
        'rc',
        'rc_and_concrete_hollow_blocks',
        'rc_and_blocks',
        'rc_and_interlink_wire',
        'rc_and_steel_matting',
        'rc_and_barbed_wire_and_other_wires',
        'others',
    ];
    
}
