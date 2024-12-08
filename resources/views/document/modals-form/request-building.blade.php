<div class="form-group mt-3">
    <label for="address">Address</label>
    <textarea type="text" class="form-control" name="address" placeholder="Enter address" value="{{ old('address') }}"
        required></textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
