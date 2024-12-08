<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsRequirements extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_true_copy_of_tct',
        'contract_of_leases_duly_notarized',
        'plans_and_design_of_fence_over',
        'tax_declaration_tax_receipt',
        'location_plan_and_vicinity_map',
        'other',
    ];
    
}
