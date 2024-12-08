<div class="form-group mt-3">
    <label for="application_no">Applicantion No.</label>
    <input type="number" class="form-control" name="application_no" id="application_no"
        placeholder="Enter Applicantion Number" value="{{ old('application_no') }}" required>
    @error('application_no')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="permit_no">Permit No.</label>
    <input type="number" class="form-control" name="permit_no" id="permit_no" placeholder="Enter Permit Number"
        value="{{ old('permit_no') }}" required>
    @error('permit_no')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<hr>

<div class="form-group mt-3">
    <label for="">Owner Applicant</label> <br>
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name"
        value="{{ old('last_name') }}" required>
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> 

<div class="form-group mt-3">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name"
        value="{{ old('first_name') }}" required>
    @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="middle_initial">Middle Initial</label>
    <input type="text" class="form-control" name="middle_initial" id="middle_initial"
        placeholder="Enter Middle Initial" value="{{ old('middle_initial') }}">
    @error('middle_initial')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="tax_account_no">Tax Account No.</label>
    <input type="text" class="form-control" name="tax_account_no" id="tax_account_no"
        placeholder="Enter Tax Account Number" value="{{ old('tax_account_no') }}" required>
    @error('tax_account_no')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="construction_owned_by_an_enterprise">Construction Owned by an Enterprise</label>
    <input type="text" class="form-control" name="construction_owned_by_an_enterprise"
        id="construction_owned_by_an_enterprise" placeholder="Enter Enterprise Name (if applicable)"
        value="{{ old('construction_owned_by_an_enterprise') }}">
    @error('construction_owned_by_an_enterprise')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="form_of_ownership">Form of Ownership</label>
    <input type="text" class="form-control" name="form_of_ownership" id="form_of_ownership"
        placeholder="Enter Form of Ownership" value="{{ old('form_of_ownership') }}" required>
    @error('form_of_ownership')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="telephone">Telephone</label>
    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Enter Telephone Number"
        value="{{ old('telephone') }}" required>
    @error('telephone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<hr>

<div class="form-group mt-3">
    <label for="">Location</label> <br>
    <label for="number">Number</label>
    <input type="number" class="form-control" name="number" id="number" placeholder="Enter Last Number"
        value="{{ old('number') }}" required>
    @error('number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="street">Street</label>
    <input type="text" class="form-control" name="street" id="street" placeholder="Enter Street"
        value="{{ old('street') }}" required>
    @error('street')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="barangay">Barangay</label>
    <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Enter Barangay"
        value="{{ old('barangay') }}" required>
    @error('barangay')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="">Address</label> <br>
    <label for="address_number">Number</label>
    <input type="number" class="form-control" name="address_number" id="address_number"
        placeholder="Enter Last Number" value="{{ old('address_number') }}" required>
    @error('address_number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="address_street">Street</label>
    <input type="text" class="form-control" name="address_street" id="address_street" placeholder="Enter Street"
        value="{{ old('address_street') }}" required>
    @error('address_street')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="address_barangay">Barangay</label>
    <input type="text" class="form-control" name="address_barangay" id="address_barangay"
        placeholder="Enter Barangay" value="{{ old('address_barangay') }}" required>
    @error('address_barangay')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<hr>

<div class="form-group mt-3">
    <h4>Scope of Work</h4>
    <label for="">Fence</label>

    <!-- New -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="new" name="new" value="1">
        <label class="form-check-label" for="new">New</label>
    </div>

    <!-- Renovation -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="renovation" name="renovation" value="1">
        <label class="form-check-label" for="renovation">Renovation</label>
    </div>

    <!-- Additional -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="additional" name="additional" value="1">
        <label class="form-check-label" for="additional">Additional</label>
    </div>

    <!-- Change of Material -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="change_of_material" name="change_of_material"
            value="1">
        <label class="form-check-label" for="change_of_material">Change of Material</label>
    </div>

    <!-- Repair -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="repair" name="repair" value="1">
        <label class="form-check-label" for="repair">Repair</label>
    </div>

    <!-- Others -->
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="others" name="fence_others" value="1">
        <label class="form-check-label" for="others">Others</label>
    </div>
</div>

<hr>

<div class="form-group mt-3">
    <h4>Box 2 (To Be Accomplished by Receiving & Recording Section)</h4>
    <label for="">Documents/Requirements</label>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="certificate_true_copy_of_tct"
            name="certificate_true_copy_of_tct" value="1">
        <label class="form-check-label" for="certificate_true_copy_of_tct">Certified True Copy of TCT</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="contract_of_leases_duly_notarized"
            name="contract_of_leases_duly_notarized" value="1">
        <label class="form-check-label" for="contract_of_leases_duly_notarized">Contract of Lease Duly
            Notarized</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="plans_and_design_of_fence_over"
            name="plans_and_design_of_fence_over" value="1">
        <label class="form-check-label" for="plans_and_design_of_fence_over">Plans & Designs of Fence Over
            1.00m</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="tax_declaration_tax_receipt"
            name="tax_declaration_tax_receipt" value="1">
        <label class="form-check-label" for="tax_declaration_tax_receipt">Tax Declaration Tax Receipt</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="location_plan_and_vicinity_map"
            name="location_plan_and_vicinity_map" value="1">
        <label class="form-check-label" for="location_plan_and_vicinity_map">Location Plan & Vicinity Map (5
            sets)</label>
    </div>

    <div class="form-group mt-3">
        <label for="other">Others:</label>
        <input type="text" class="form-control" id="other" name="other"
            placeholder="Specify other document(s)">
    </div>
</div>

<hr>

<!-- Box 3 -->
<div class="form-group mt-3">
    <h4>Box 3 (To Be Accomplished by Designing Architect/Civil Engineer/Contractor in Print)</h4>
    <label for="">Measurements in meters</label>
    <div class="form-group">
        <label for="length">Length (in meters)</label>
        <input type="text" class="form-control" name="length" id="length" placeholder="Enter Length">
    </div>
    <div class="form-group mt-2">
        <label for="height">Height (in meters)</label>
        <input type="text" class="form-control" name="height" id="height" placeholder="Enter Height">
    </div>
    <div class="form-group mt-2">
        <label for="excess">Excess (in meters)</label>
        <input type="text" class="form-control" name="excess" id="excess" placeholder="Enter Excess">
    </div>
    <h5 class="mt-4">Type of Fencing</h5>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="indigenous" name="indigenous" value="1">
        <label class="form-check-label" for="indigenous">Indigenous</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="reinforced_concrete" name="reinforced_concrete"
            value="1">
        <label class="form-check-label" for="reinforced_concrete">R.C (Reinforced Concrete)</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="concrete_hollow_blocks" name="concrete_hollow_blocks"
            value="1">
        <label class="form-check-label" for="concrete_hollow_blocks">R.C & Concrete Hollow Blocks</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="blocks" name="blocks" value="1">
        <label class="form-check-label" for="blocks">R.C & Blocks</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="interlink_or_cyclone_wire"
            name="interlink_or_cyclone_wire" value="1">
        <label class="form-check-label" for="interlink_or_cyclone_wire">R.C & Interlink/Cyclone Wire</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="steel_matting" name="steel_matting" value="1">
        <label class="form-check-label" for="steel_matting">R.C & Steel Matting</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="barbed_wire_and_others" name="barbed_wire_and_others"
            value="1">
        <label class="form-check-label" for="barbed_wire_and_others">R.C & Barbed Wire & Other Wires</label>
    </div>
    <div class="form-group mt-2">
        <label for="others">Others:</label>
        <input type="text" class="form-control" id="others" name="others"
            placeholder="Specify other types of fencing">
    </div>
</div>
