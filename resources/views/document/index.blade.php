@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Appointment</div>
                @resident
                    <button class="btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Request Document
                    </button>
                @endresident
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('request-documents.index') }}"
                    class="mb-3 d-flex align-items-center justify-content-between">
                    @csrf
                    <div class="mr-2 me-3">
                        <input type="text" name="document_name2" id="document_name2" class="form-control"
                            value="{{ request('document_name2') }}" placeholder="Search by Document Name">
                    </div>

                    <div class="d-flex">
                        <div class="mr-2 me-3">
                            <select name="status" id="status" class="form-control">
                                <option value="">All</option>
                                <option value="0" {{ request('status') == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Accepted</option>
                                <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Rejected</option>
                                <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>Expired</option>
                            </select>
                        </div>

                        <div class="mr-2 me-3">
                            <select name="archivedStatus" id="archivedStatus" class="form-control">
                                <option value="2" {{ request('archivedStatus') == 2 ? 'selected' : '' }}>All
                                </option>
                                <option value="0" {{ request('archivedStatus') == 0 ? 'selected' : '' }}>Active
                                </option>
                                <option value="1" {{ request('archivedStatus') == 1 ? 'selected' : '' }}>Archived
                                </option>
                            </select>
                        </div>

                        <div class="mr-2 me-3">
                            <input type="text" name="schedule" id="schedule" class="form-control"
                                value="{{ request('schedule') }}" placeholder="Search by Schedule">
                        </div>

                        <div class="mr-2 me-3">
                            <input type="text" name="valid_until" id="valid_until" class="form-control"
                                value="{{ request('valid_until') }}" placeholder="Search by Valid Until">
                        </div>

                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
                <div class="card card-body border-0 shadow table-wrapper table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    {{-- CREATE REQUEST DOCUMENT --}}
    @include('document.modals.create')

    {{-- ACCEPT REQUEST DOCUMENT --}}
    @include('document.modals.accept')

    {{-- REJECT REQUEST DOCUMENT --}}
    @include('document.modals.reject')
    @include('document.modals.archive')
    @include('document.modals.unarchive')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(function() {
            // Initialize DataTable
            const tableInstance = window.LaravelDataTables['requestDocument_dataTable'] = $(
                '#requestDocument_dataTable').DataTable();

            // Event listener for DataTable redraw
            tableInstance.on('draw.dt', function() {
                // Accept button click handler
                $('.acceptBtn').click(function() {
                    $('#accept-form').attr('action', '/accept-document/' + $(this).data(
                        'document'));
                });

                // Reject button click handler
                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject-document/' + $(this).data(
                        'document'));
                });

                $('.archiveBtn').click(function() {
                    $('#archive-form').attr('action', '/archive-resident-document/' + $(this).data(
                        'document'));
                    $('#unarchive-form').attr('action', '/unarchive-resident-document/' + $(this)
                        .data(
                            'document'));
                });
            });

            // Handle change event for the document_name select dropdown
            $('#document_name').on('change', function() {
                var selectedValue = $(this).val();

                // Check if the selected value is "Barangay Clearance"
                if (selectedValue === 'Barangay Clearance') {
                    // Dynamically load the modal form if "Barangay Clearance" is selected
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-clearance') }}');
                } else if (selectedValue === 'Barangay Business Permit') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-business-permit') }}')
                } else if (selectedValue === 'Barangay Permit to Construct') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-request-building') }}')
                } else if (selectedValue === 'Barangay Indigency Certificate') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-certificate') }}')
                } else if (selectedValue === 'Barangay Blotter/Complaint Report') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-complaint') }}')
                } else if (selectedValue === 'Barangay Medic Legal Certificate') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-medic') }}')
                } else if (selectedValue === 'Baranggay Fencing Permit') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-fencing') }}')
                } else {
                    // Clear the container content if a different value is selected
                    $('#brgy-document').empty();
                }
            });
        });
    </script>
@endpush
