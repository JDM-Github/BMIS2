@extends('layouts.guest')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="card justify-content-center">
            <div class="card-header">
                <div class="text-center text-md-center  mt-2">
                    <h1 class="mt-n3 mb-0 h3">{{ __('Register Resident') }}</h1>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col">
                            <!-- Last Name Input -->
                            <div class="form-group mb-4">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-user-alt fa-fw"></i>
                                    </span>
                                    <input name="last_name" id="last_name" type="text" class="form-control"
                                        placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
                                </div>
                                @error('last_name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- First Name Input -->
                            <div class="form-group mb-4">
                                <label for="first_name">{{ __('First Name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-user-alt fa-fw"></i>
                                    </span>
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="{{ __('First Name') }}" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Middle Name Input -->
                            <div class="form-group mb-4">
                                <label for="middle_name">{{ __('Middle Name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-user-alt fa-fw"></i>
                                    </span>
                                    <input name="middle_name" id="middle_name" type="text" class="form-control"
                                        placeholder="{{ __('Middle Name') }}" value="{{ old('middle_name') }}">
                                </div>
                                @error('middle_name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Birthdate Input -->
                            <div class="form-group mb-4">
                                <label for="birthdate">{{ __('Birthdate') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-calendar-alt fa-fw"></i>
                                    </span>
                                    <input name="birthdate" id="birthdate" type="date" class="form-control"
                                        placeholder="{{ __('Birthdate') }}" value="{{ old('birthdate') }}" required>
                                </div>
                                @error('birthdate')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <script>
                                document.getElementById('birthdate').setAttribute('max', new Date().toISOString().split('T')[0]);
                            </script>


                            <!-- Gender Input -->
                            <div class="form-group mb-4">
                                <label for="gender">{{ __('Gender') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-venus-mars fa-fw"></i>
                                    </span>
                                    <select name="gender" class="form-control">
                                        <option @selected(true) @disabled(true)>Select</option>
                                        @foreach (App\Enums\GenderEnum::cases() as $gender)
                                            <option value="{{ $gender->value }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Contact Number Input -->
                            <div class="form-group mb-4">
                                <label for="contact_number">{{ __('Contact Number') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-phone fa-fw"></i>
                                    </span>
                                    <input name="contact_number" id="contact_number" type="tel" class="form-control"
                                        placeholder="{{ __('Contact Number') }}" value="{{ old('contact_number') }}"
                                        required maxlength="11">
                                </div>
                                @error('contact_number')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <script>
                                document.getElementById('contact_number').addEventListener('input', function(e) {
                                    this.value = this.value.replace(/\D/g, '');
                                    if (this.value.length > 11) {
                                        this.value = this.value.slice(0, 11);
                                    }
                                });
                            </script>

                            <div class="form-group mb-4">
                                <label for="password">{{ __('Your Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </span>
                                    <input name="password" type="password" placeholder="{{ __('Password') }}"
                                        class="form-control" id="password" required autocomplete="new-password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </span>
                                    <input name="password_confirmation" type="password"
                                        placeholder="{{ __('Confirm Password') }}" class="form-control"
                                        id="password_confirmation" required>
                                </div>
                            </div>

                            <!-- Form -->


                            <!-- End of Form -->
                        </div>
                        <div class="col">
                            <div class="form-group mb-4">
                                <label for="email">{{ __('Your Email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input name="email" id="email" type="email" class="form-control"
                                        placeholder="{{ __('Email') }}" value="{{ old('email') }}" autofocus
                                        required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="id_pic">{{ __('Id File') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-user-alt fa-fw"></i>
                                    </span>
                                    <input name="id_pic" id="id_pic" type="file" class="form-control"
                                        placeholder="{{ __('ID') }}" value="{{ old('id_pic') }}" required>
                                </div>
                                @error('id_pic')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="address">{{ __('Address (Ex. Purok # then House #)') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-map-marker-alt fa-fw"></i>
                                    </span>
                                    <input name="address" id="address" type="text" class="form-control"
                                        placeholder="{{ __('Address') }}" value="{{ old('address') }}" required>
                                </div>
                                @error('address')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Barangay Input -->
                            <div class="form-group mb-4" style="display: none">
                                <label for="barangay">{{ __('Barangay') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-map-pin fa-fw"></i>
                                    </span>
                                    <input name="barangay" id="barangay" type="text" class="form-control"
                                        placeholder="{{ __('Barangay') }}" value="Kayanlog" required>
                                </div>
                                @error('barangay')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Municipality Input -->
                            <div class="form-group mb-4" style="display: none">
                                <label for="municipality">{{ __('Municipality') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-city fa-fw"></i>
                                    </span>
                                    <input name="municipality" id="municipality" type="text" class="form-control"
                                        placeholder="{{ __('Municipality') }}" value="Calamba" required>
                                </div>
                                @error('municipality')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Province Input -->
                            <div class="form-group mb-4" style="display: none">
                                <label for="province">{{ __('Province') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-map fa-fw"></i>
                                    </span>
                                    <input name="province" id="province" type="text" class="form-control"
                                        placeholder="{{ __('Province') }}" value="Laguna" required>
                                </div>
                                @error('province')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <!-- Number of Years Dropdown -->
                            <div class="form-group mb-4">
                                <label for="number_of_years">{{ __('Number Of Years') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <select name="number_of_years" id="number_of_years" class="form-control" required>
                                        <option value="" disabled selected>{{ __('Select Number of Years') }}
                                        </option>
                                        @for ($i = 1; $i <= 70; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('number_of_years') == $i ? 'selected' : '' }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('number_of_years')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>


                            <!-- Form -->

                            <!-- End of Form -->
                            <!-- Form -->


                        </div>
                        {{-- <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tap Exact Map Location</label>
                                        <div id="map" style="height: 450px; width:600px"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mb-4">
                                        <label for="purok_number">{{ __('Purok Number') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                            </span>
                                            <input name="purok_number" id="purok_number" type="text" class="form-control"
                                                placeholder="{{ __('Purok Number') }}" value="{{ old('purok_number') }}"
                                                required>
                                        </div>
                                        @error('purok_number')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="purok_number">{{ __('Purok Number') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                            </span>
                                            <input name="purok_number" id="purok_number" type="text" class="form-control"
                                                placeholder="{{ __('Purok Number') }}" value="{{ old('purok_number') }}"
                                                required>
                                        </div>
                                        @error('purok_number')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                        <!-- End of Form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gray-800">{{ __('Register') }}</button>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <span class="fw-normal">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="fw-bold">{{ __('Login here') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    {{-- 
    <script>
        var map = L.map('map').setView([14.16417434103448, 121.1198380710959], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var searchControl = new L.Control.Search({
            position: 'topright',
            layer: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
            initial: false,
            zoom: 10,
            marker: L.marker([0, 0]),
            collapsed: true
        });

        map.addControl(searchControl);

        map.on('click', function(e) {
            var latlng = e.latlng;
            L.marker(latlng).addTo(map)
                .bindPopup('Latitude: ' + latlng.lat + '<br>Longitude: ' + latlng.lng)
                .openPopup();
        });
    </script> --}}

    <script>
        document.getElementById('contact_number').addEventListener('input', function(e) {
            // Remove non-digit characters
            this.value = this.value.replace(/\D/g, '');

            // Limit to 11 characters
            if (this.value.length > 11) {
                this.value = this.value.slice(0, 11);
            }
        });
    </script>
@endsection
