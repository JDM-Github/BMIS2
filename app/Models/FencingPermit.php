<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FencingPermit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'request_document_id',
        'location_id',
        'address_id',
        'fence_id',
        'documents_requirements_id',
        'measurements_in_meters_id',
        'type_of_fencing_id',
        'application_no',
        'permit_no',
        'last_name',
        'first_name',
        'middle_initial',
        'tax_account_no',
        'construction_owned_by_an_enterprise',
        'form_of_ownership',
        'telephone',
        'local_building_office',
    ];

    /**
     * Get the user associated with the fencing permit.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the request document associated with the fencing permit.
     */
    public function requestDocument()
    {
        return $this->belongsTo(RequestDocument::class);
    }

    /**
     * Get the location associated with the fencing permit.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the address associated with the fencing permit.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get the fence associated with the fencing permit.
     */
    public function fence()
    {
        return $this->belongsTo(Fence::class);
    }

    /**
     * Get the document requirements associated with the fencing permit.
     */
    public function documentsRequirements()
    {
        return $this->belongsTo(DocumentsRequirements::class);
    }

    /**
     * Get the measurements in meters associated with the fencing permit.
     */
    public function measurementsInMeters()
    {
        return $this->belongsTo(MeasurementsInMeters::class);
    }

    /**
     * Get the type of fencing associated with the fencing permit.
     */
    public function typeOfFencing()
    {
        return $this->belongsTo(TypeOfFencing::class);
    }
}
