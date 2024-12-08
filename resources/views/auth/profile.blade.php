@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">{{ __('My profile') }}</h2>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label for="name">{{ __('Your Name') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user-alt fa-fw"></i>
                                    </span>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}"
                                        required>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
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
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('Email') }}" id="email"
                                        value="{{ old('email', auth()->user()->email) }}" required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label for="password">{{ __('New Password') }}</label>
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
                                    <input type="password" name="password" placeholder="{{ __('New Password') }}"
                                        class="form-control" id="password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
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
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="{{ __('New password confirmation') }}"
                                        autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        @resident
                            <!-- Additional Fields -->
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3">
                                    <label for="last_name">{{ __('Last Name') }}</label>
                                    <input id="last_name" class="form-control" type="text" name="last_name"
                                        placeholder="{{ __('Last Name') }}"
                                        value="{{ old('last_name', auth()->user()->last_name) }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="middle_name">{{ __('Middle Name') }}</label>
                                    <input id="middle_name" class="form-control" type="text" name="middle_name"
                                        placeholder="{{ __('Middle Name') }}"
                                        value="{{ old('middle_name', auth()->user()->middle_name) }}">
                                    @error('middle_name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="birthdate">{{ __('Birthdate') }}</label>
                                    <input id="birthdate" class="form-control" type="date" name="birthdate"
                                        value="{{ old('birthdate', auth()->user()->birthdate) }}">
                                    @error('birthdate')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender">{{ __('Gender') }}</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="Male"
                                            {{ old('gender', auth()->user()->gender) == 'Male' ? 'selected' : '' }}>
                                            {{ __('Male') }}
                                        </option>
                                        <option value="Female"
                                            {{ old('gender', auth()->user()->gender) == 'Female' ? 'selected' : '' }}>
                                            {{ __('Female') }}
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="number_of_years">{{ __('Number of Years') }}</label>
                                    <input id="number_of_years" class="form-control" type="number" name="number_of_years"
                                        placeholder="{{ __('Number of Years') }}"
                                        value="{{ old('number_of_years', auth()->user()->number_of_years) }}">
                                    @error('number_of_years')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_number">{{ __('Contact Number') }}</label>
                                    <input id="contact_number" class="form-control" type="text" name="contact_number"
                                        placeholder="{{ __('Contact Number') }}"
                                        value="{{ old('contact_number', auth()->user()->contact_number) }}" required>
                                    @error('contact_number')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="id_pic">{{ __('ID Picture') }}</label>
                                    <input id="id_pic" class="form-control" type="file" name="id_pic">
                                    @error('id_pic')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                        @endresident

                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-gray-800 mt-2 animate-up-2">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if ($message = Session::get('success'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ $message }}',
            })
        </script>
    @endif
@endsection
