{{-- Reject --}}

<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectPromoModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="reject-form">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">Are you sure you want to reject this?</div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
