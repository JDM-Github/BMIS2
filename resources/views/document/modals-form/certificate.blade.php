<div class="form-group mt-3">
    <label for="subject">Subject</label>
    <textarea type="text" class="form-control" name="subject" placeholder="Enter subject" value="{{ old('subject') }}"
        required></textarea>
    @error('subject')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="purpose">Purpose</label>
    <textarea type="text" class="form-control" name="purpose" placeholder="Enter purpose" value="{{ old('purpose') }}"
        required></textarea>
    @error('purpose')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
