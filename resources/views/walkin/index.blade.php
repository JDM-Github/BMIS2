@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Walk In</div>
                @admin
                    <button class="btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Walk In
                    </button>
                @endadmin
            </div>


            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <form method="GET" action="{{ route('walkin.index') }}"
                    class="mb-3 d-flex align-items-center justify-content-between">
                    @csrf
                    <div></div>
                    <div class="d-flex">
                        <div class="mr-2 me-3">
                            <select name="archivedStatus" id="archivedStatus" class="form-control">
                                <option value="2" {{ request('archivedStatus') == 2 ? 'selected' : '' }}>All</option>
                                <option value="0" {{ request('archivedStatus') == 0 ? 'selected' : '' }}>Active
                                </option>
                                <option value="1" {{ request('archivedStatus') == 1 ? 'selected' : '' }}>Archived
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @include('walkin.modals.create')
    @include('walkin.modals.archive')
    @include('walkin.modals.unarchive')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['walk_in_table'] = $(
                    '#walk_in_table')
                .DataTable()
            tableInstance.on('draw.dt', function() {
                $('.archiveBtn').click(function() {
                    $('#archive-form').attr('action', '/archive-document/' + $(this).data(
                        'document'));
                    $('#unarchive-form').attr('action', '/unarchive-document/' + $(this).data(
                        'document'));
                });
            })
        });
    </script>
@endpush
