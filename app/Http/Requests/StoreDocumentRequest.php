<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // REQUEST DOCUMENT
            'document_name' => ['required', 'string'],

            // BARANGAY CLEARANCE
            'is_certified' => ['nullable', 'string'],
            'purpose' => ['nullable', 'string'],

            // BUSINESS PERMIT
            'nature_of_business' => ['nullable', 'string', 'max:255'],
            'proprietor' => ['nullable', 'string', 'max:255'],
            'permit_number' => ['nullable', 'string', 'max:255', 'unique:business_permits,permit_number'],
            'address' => ['nullable', 'string', 'max:500'],
            'business_location' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable',],

            // CERTIFICATE OF INDIGENCY
            'subject' => ['nullable', 'string'],

            // COMPLAINT
            'complainant' => ['nullable', 'string', 'max:255'],
            'against' => ['nullable', 'string', 'max:255'],
            'respondents' => ['nullable', 'string', 'max:255'],
            'violate' => ['nullable', 'string'],

            // MEDIC
            'medical_facility' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date',],
            'medical_conditions' => ['nullable', 'string'],
            'time_of_arrival' => ['nullable', 'date_format:H:i'],
            'brought_by' => ['nullable', 'string', 'max:255'],
            'relationship' => ['nullable', 'string', 'max:255'],
            'start' => ['nullable', 'integer', 'min:1'],
            'end' => ['nullable', 'integer', 'min:1'],

            // FENCING
            'application_no' => ['nullable', 'numeric'],
            'permit_no' => ['nullable', 'numeric'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'middle_initial' => ['nullable', 'string', 'max:1'],
            'tax_account_no' => ['nullable', 'string', 'max:255'],
            'construction_owned_by_an_enterprise' => ['nullable', 'string', 'max:255'],
            'form_of_ownership' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'number' => ['nullable', 'numeric'],
            'street' => ['nullable', 'string', 'max:255'],
            'barangay' => ['nullable', 'string', 'max:255'],
            'address_number' => ['nullable', 'numeric'],
            'address_street' => ['nullable', 'string', 'max:255'],
            'address_barangay' => ['nullable', 'string', 'max:255'],

            // FENCE
            'new' => ['nullable', 'boolean'],
            'renovation' => ['nullable', 'boolean'],
            'additional' => ['nullable', 'boolean'],
            'change_of_material' => ['nullable', 'boolean'],
            'repair' => ['nullable', 'boolean'],
            'fence_others' => ['nullable', 'boolean'],

            // DOCUMENTS
            'certificate_true_copy_of_tct' => ['boolean'],
            'contract_of_leases_duly_notarized' => ['boolean'],
            'plans_and_design_of_fence_over' => ['boolean'],
            'tax_declaration_tax_receipt' => ['boolean'],
            'location_plan_and_vicinity_map' => ['boolean'],
            'other' => ['nullable', 'string', 'max:255'],

            // MEASUREMENT IN METERS
            'length' => ['nullable', 'string'],
            'height' => ['nullable', 'string'],
            'excess' => ['nullable', 'string'],

            // TYPE OF FENCING
            'indigenous' => ['boolean'],
            'reinforced_concrete' => ['boolean'],
            'concrete_hollow_blocks' => ['boolean'],
            'blocks' => ['boolean'],
            'interlink_or_cyclone_wire' => ['boolean'],
            'steel_matting' => ['boolean'],
            'barbed_wire_and_others' => ['boolean'],
            'others' => ['nullable', 'string', 'max:255'],
        ];
    }
}
