<div class="form-group mt-3">
    <label for="nature_of_business">Nature of Business</label>
    <textarea type="text" class="form-control" name="nature_of_business" placeholder="Enter nature of business"
        value="{{ old('nature_of_business') }}" required></textarea>
    @error('nature_of_business')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="proprietor">Proprietor</label>
    <input type="text" class="form-control" name="proprietor" placeholder="Enter proprietor name"
        value="{{ old('proprietor') }}" required>
    @error('proprietor')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="permit_number">Permit Number</label>
    <input type="number" class="form-control" name="permit_number" placeholder="Enter permit number"
        value="{{ old('permit_number') }}" required>
    @error('permit_number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="address">Address</label>
    <textarea type="text" class="form-control" name="address" placeholder="Enter address" value="{{ old('address') }}"
        required></textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="business_location">Business Location</label>
    <input type="text" class="form-control" name="business_location" placeholder="Enter business location"
        value="{{ old('business_location') }}" required>
    @error('business_location')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="status">Status</label>
    <select class="form-control" name="status" required>
        <option value="" disabled selected>Select status</option>
        <option value="Active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
