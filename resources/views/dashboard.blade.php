@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <form method="GET" action="{{ route('dashboard') }}" class="mb-3">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="form-group mb-0 mr-3">
                        <label for="timePeriod" class="sr-only">Select Time Period</label>
                        <select name="timePeriod" id="timePeriod" class="form-control">
                            <option value="week" {{ request('timePeriod') == 'week' ? 'selected' : '' }}>Last Week
                            </option>
                            <option value="month" {{ request('timePeriod') == 'month' ? 'selected' : '' }}>Last Month
                            </option>
                            <option value="year" {{ request('timePeriod') == 'year' ? 'selected' : '' }}>Last Year
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">Apply</button>
                </div>
            </form>

            <div class="col-md-12 mb-2">
                <div class="card shadow-lg border-light">
                    <div class="card-header d-flex justify-content-between"
                        style="background-color: #a30448; color: white;">
                        <h5 style="color: white;">Bulletin</h5>

                        <div>
                            <button class="btn" style="background-color: #FBE9E7; color: black; border-radius: 5px;"
                                data-toggle="modal" data-target="#addBulletinModal">
                                Add
                            </button>
                            <button class="btn" style="background-color: #FBE9E7; color: black; border-radius: 5px;"
                                data-toggle="modal" data-target="#addBulletinModalEmergency">
                                Add Emergency
                            </button>
                        </div>
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


            <div class="modal fade" id="addBulletinModal" tabindex="-1" role="dialog"
                aria-labelledby="addBulletinModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #a30448; color: white;">
                            <h5 class="modal-title" id="addBulletinModalLabel" style="color: white">Add New Bulletin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="background-color: transparent; border: none; outline: none;">
                                <span aria-hidden="true" style="font-size: 2rem !important; color: white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('bulletin.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Save Bulletin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addBulletinModalEmergency" tabindex="-1" role="dialog"
                aria-labelledby="addBulletinModalEmergencyLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #a30448; color: white;">
                            <h5 class="modal-title" id="addBulletinModalEmergencyLabel" style="color: white">Add New
                                Emergency Bulletin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="background-color: transparent; border: none; outline: none;">
                                <span aria-hidden="true" style="font-size: 2rem !important; color: white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('bulletin.storeEmergency') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Save Bulletin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Section -->
            <div class="col-md-12 mb-3">
                <div class="card shadow-lg border-light" style="background-color: #a3044822">
                    <div class="card-body">
                        {{-- <div class="row">
                            <!-- User Growth -->
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>User Growth</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="userGrowth">{{ $userGrowth }}%</h4>
                                        <p>
                                            @if ($timePeriod == 'week')
                                                Users added in the last week
                                            @elseif($timePeriod == 'month')
                                                Users added in the last month
                                            @elseif($timePeriod == 'year')
                                                Users added in the last year
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Services Usage -->
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Services Usage</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="servicesUsage">{{ $servicesUsage }}%</h4>
                                        <p>
                                            @if ($timePeriod == 'week')
                                                Services used in the last week
                                            @elseif($timePeriod == 'month')
                                                Services used in the last month
                                            @elseif($timePeriod == 'year')
                                                Services used in the last year
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <!-- Active vs Inactive Residents -->
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Active vs Inactive Residents</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="activeVsInactive">{{ $activePercentage }}% Active</h4>
                                        <p>Percentage of active residents</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending vs Completed Appointments -->
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Pending vs Completed Appointments</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="pendingVsCompleted">{{ $completedPercentage }}% Completed</h4>
                                        <p>
                                            @if ($timePeriod == 'week')
                                                Appointments completed in the last week
                                            @elseif($timePeriod == 'month')
                                                Appointments completed in the last month
                                            @elseif($timePeriod == 'year')
                                                Appointments completed in the last year
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Charts Section -->
                        <div class="row">
                            <!-- User Growth Chart -->
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>User Engagement - Chart</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="userGrowthChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Services Usage Chart -->
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Services Usage - Chart</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="servicesUsageChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Total Documents -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Total Documents</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="totalDocuments">{{ $totalDocuments }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Services Done -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Services Done</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="servicesDone">{{ $servicesDone }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Residents -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Total Residents</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="totalResidents">{{ $residentCount }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Residents -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: black;">
                                        <h6>Pending Residents</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="pendingResidents">{{ $pendingResidentCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Male Residents -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Male Residents</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="maleResidents">{{ $maleCount }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Female Residents -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Female Residents</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="femaleResidents">{{ $femaleCount }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Other Gender -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h6>Other Gender</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="otherGender">{{ $otherGenderCount }}</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Appointments -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: black;">
                                        <h6>Pending Appointments</h6>
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 id="pendingAppointments">{{ $pendingDocument }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Blotter Records -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h5>Blotter Records</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <h3 id="blotterRecords">{{ $blotterRecordCount }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Houses -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card shadow-sm border-light h-100">
                                    <div class="card-header text-center" style="color: white;">
                                        <h5>Total Houses</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <h3 id="totalHouses">{{ $residentCount }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script for Charts -->
    <script>
        var userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        var servicesUsageCtx = document.getElementById('servicesUsageChart').getContext('2d');

        var userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Last Month', 'This Month'],
                datasets: [{
                    label: 'User Growth',
                    data: [{{ $userGrowth }}, 100],
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
