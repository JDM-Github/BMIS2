<div class="form-group mt-3">
    <label for="medical_facility">Medical Facility</label>
    <input type="text" class="form-control" id="medical_facility" name="medical_facility"
        placeholder="Enter medical facility" value="{{ old('medical_facility') }}" required>
    @error('medical_facility')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Examination/Treatment Start Date -->
<div class="form-group mt-3">
    <label for="start_date">Examination/Treatment Start Date</label>
    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}"
        required>
    @error('start_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Examination/Treatment End Date -->
<div class="form-group mt-3">
    <label for="end_date">Examination/Treatment End Date</label>
    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
    @error('end_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Medical Conditions/Treatments -->
<div class="form-group mt-3">
    <label for="medical_conditions">Medical Conditions/Treatments</label>
    <textarea class="form-control" name="medical_conditions" id="medical_conditions" rows="4"
        placeholder="Describe medical conditions or treatments" required>{{ old('medical_conditions') }}</textarea>
    @error('medical_conditions')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Time of Arrival -->
<div class="form-group mt-3">
    <label for="time_of_arrival">Time of Arrival</label>
    <input type="time" class="form-control" id="time_of_arrival" name="time_of_arrival"
        value="{{ old('time_of_arrival') }}" required>
    @error('time_of_arrival')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Person Who Brought the Patient -->
<div class="form-group mt-3">
    <label for="brought_by">Brought By</label>
    <input type="text" class="form-control" id="brought_by" name="brought_by"
        placeholder="Enter the name of the person who brought the patient" value="{{ old('brought_by') }}" required>
    @error('brought_by')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Relationship to Patient -->
<div class="form-group mt-3">
    <label for="relationship">Relationship to Patient</label>
    <input type="text" class="form-control" id="relationship" name="relationship"
        placeholder="Enter relationship (e.g., spouse, parent)" value="{{ old('relationship') }}" required>
    @error('relationship')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Treatment Duration -->
<div class="form-group mt-3">
    <label for="start">Treatment will take from ___ </label>
    <input type="number" class="form-control" id="start" name="start"
        placeholder="Enter treatment duration in days" value="{{ old('start') }}" required>
    @error('start')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="form-group mt-3">
    <label for="end">to ___ day</label>
    <input type="number" class="form-control" id="end" name="end"
        placeholder="Enter treatment duration in days" value="{{ old('end') }}" required>
    @error('end')
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
