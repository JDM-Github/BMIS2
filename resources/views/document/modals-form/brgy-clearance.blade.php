    <div class="form-group mt-3">
        <label for="">Certified / Non Certified</label>
        <select class="form-control" name="is_certified" required>
            <option value="" selected disabled>Select</option>
            <option value="Certified">Certified</option>
            <option value="Non-Certified">Non Certified</option>
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="purpose">Purpose</label>
        <textarea type="text" class="form-control" name="purpose" placeholder="Enter purpose" value="{{ old('purpose') }}"
            required></textarea>
        @error('purpose')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
