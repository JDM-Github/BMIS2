{{-- VIEW RESIDENT --}}
<style>
    @media (min-width: 992px) {

        /* For large screens */
        #map {
            width: 730px;
            /* Fixed width */
            height: 600px;
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
                <h5 class="modal-title" id="exampleModalLabel">View Resident</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4"> <!-- Responsive columns -->
                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name') }}</label>
                            <div class="input-group">
                                <input name="last_name" type="text" id="view_last_name" @class(['form-control'])
                                    placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group">
                                <input name="name" type="text" id="view_name" @class(['form-control'])
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="middle_name">{{ __('Middle Name') }}</label>
                            <div class="input-group">
                                <input name="middle_name" type="text" id="view_middle_name"
                                    @class(['form-control']) placeholder="{{ __('Middle Name') }}"
                                    value="{{ old('middle_name') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="birthdate">{{ __('Birthdate') }}</label>
                            <div class="input-group">
                                <input name="birthdate" type="date" id="view_birthdate" @class(['form-control'])
                                    placeholder="{{ __('Birthdate') }}" value="{{ old('birthdate') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="gender">{{ __('Gender') }}</label>
                            <div class="input-group">
                                <input name="gender" type="text" id="view_gender" @class(['form-control'])
                                    placeholder="{{ __('Gender') }}" value="{{ old('gender') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="contact_number">{{ __('Contact Number') }}</label>
                            <div class="input-group">
                                <input name="contact_number" type="text" id="view_contact_number"
                                    @class(['form-control']) placeholder="{{ __('Contact Number') }}"
                                    value="{{ old('contact_number') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">{{ __('Email') }}</label>
                            <div class="input-group">
                                <input name="email" type="email" id="view_email" @class(['form-control'])
                                    placeholder="{{ __('Email') }}" value="{{ old('email') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="view_id_pic">{{ __('ID File') }}</label>
                            <div class="input-group">
                                <input name="id_pic" type="text" id="view_id_pic" class="form-control"
                                    placeholder="{{ __('ID File') }}" readonly>
                                <a href="#" id="link_id_pic" class="btn btn-link" target="_blank">Download</a>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="number_of_years">{{ __('Number of Years') }}</label>
                            <div class="input-group">
                                <input name="number_of_years" type="text" id="view_number_of_years" @class(['form-control'])
                                    placeholder="{{ __('Number of Years') }}" value="{{ old('number_of_years') }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4"> <!-- Responsive columns -->
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <div class="input-group">
                                <input name="address" type="text" id="view_address" @class(['form-control'])
                                    placeholder="{{ __('Purok Number') }}" value="{{ old('address') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="barangay">{{ __('Barangay') }}</label>
                            <div class="input-group">
                                <input name="barangay" type="text" id="view_barangay" @class(['form-control'])
                                    placeholder="{{ __('Barangay') }}" value="{{ old('barangay') }}" readonly>
                            </div>
                        </div>


                        <div class="form-group mt-3">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" width="730" height="400"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-4"> <!-- Full width on small screens, partial on larger -->
                        <div class="form-group">
                            <label for="municipality">{{ __('Municipality') }}</label>
                            <div class="input-group">
                                <input name="municipality" type="text" id="view_municipality"
                                    @class(['form-control']) placeholder="{{ __('Municipality') }}"
                                    value="{{ old('municipality') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="province">{{ __('Province') }}</label>
                            <div class="input-group">
                                <input name="province" type="text" id="view_province"
                                    @class(['form-control']) placeholder="{{ __('Province') }}"
                                    value="{{ old('province') }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
