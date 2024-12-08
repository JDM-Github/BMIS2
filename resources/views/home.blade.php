@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-2">
        <div class="card shadow-lg border-light">
            <div class="card-header d-flex justify-content-between" style="background-color: #a30448; color: white;">
                <h5 style="color: white;">Bulletin</h5>

            </div>
            <div class="card-body">
                @forelse($bulletins as $bulletin)
                    <div class="alert {{ $bulletin->is_emergency ? 'alert-danger' : 'alert-info' }}">
                        <strong>{{ $bulletin->is_emergency ? 'Emergency Announcement:' : 'Announcement:' }}</strong>
                        {{ $bulletin->message }}
                        <br><small><em>{{ $bulletin->created_at->toFormattedDateString() }}</em></small>
                    </div>
                @empty
                    <div class="alert alert-warning">
                        <strong>No new bulletins.</strong> Please check back later for updates.
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    {{-- 
    <div class="card mt-5">
        <div class="card-header text-center">
            <h5>Overview/Statistics</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Census</th>
                        <th scope="col">Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Population</td>
                        <td>26,000</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div> --}}

    <div class="card mt-3">
        <div class="card-header text-center">
            <h5>Organization Charts</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <!-- Organization Chart Cards -->
                @foreach ($members as $member)
                    <div class="col-12 col-md-4 col-lg-3 mb-4 d-flex justify-content-center">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('images/pics/' . $member['image']) }}"
                                alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $member['name'] }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $member['role'] }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    @include('layouts.footer')
@endsection
