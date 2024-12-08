{{-- VIEW --}}
<style>
    @media (min-width: 992px) {

        /* For large screens */
        #map {
            width: 100%;
            /* Fixed width */
            height: 400px;
            /* Fixed height */
        }
    }

    @media (max-width: 991px) {

        /* For medium and smaller screens */
        #map {
            width: 100%;
            /* Full width */
            height: auto;
            /* Maintain aspect ratio */
        }
    }
</style>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="730" height="400"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
