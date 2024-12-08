{{-- VIEW --}}

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input name="title" type="text" id="view_title" class="form-control" 
                        placeholder="{{ __('Title') }}" readonly>
                </div>

                <div class="form-group mt-3">
                    <label for="view_file">{{ __('File') }}</label>
                    <div class="input-group">
                        <input name="file" type="text" class="form-control"
                            placeholder="{{ __('File') }}" readonly>
                        <a href="#" id="link_file" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="date">{{ __('Date') }}</label>
                    <input name="date" type="text" id="view_date" class="form-control" 
                        placeholder="{{ __('Date') }}" readonly>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
