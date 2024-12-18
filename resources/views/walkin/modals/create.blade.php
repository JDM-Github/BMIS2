{{-- CREATE Walk-in Modal --}}

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Register Walk-In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('walkin.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Enter full name"
                            required>
                        @error('full_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number"
                            placeholder="Enter contact number" required>
                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="document_type">Document Type</label>
                        <select class="form-control" name="document_type" required>
                            <option value="" disabled selected>Select document type</option>
                            @foreach (\App\Enums\DocumentTypeEnum::cases() as $documentType)
                                <option value="{{ $documentType->value }}">{{ $documentType->value }}</option>
                            @endforeach
                        </select>
                        @error('document_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="purpose_of_request">Purpose of Request</label>
                        <textarea class="form-control" name="purpose_of_request" rows="3"
                            placeholder="Describe the reason for walk-in visit" required></textarea>
                        @error('purpose_of_request')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
