@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Blotter Record</div>
                @admin
                    <button class="btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Create Blotter
                    </button>
                @endadmin
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    {{-- CREATE BLOTTER --}}
    @include('blotter-record.modals.create')

    {{-- VIEW BLOTTER --}}
    @include('blotter-record.modals.view')

    {{-- EDIT BLOTTER --}}
    @include('blotter-record.modals.edit')

    {{-- DELETE BLOTTER --}}
    @include('blotter-record.modals.delete')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['blotterRecord_dataTable'] = $(
                    '#blotterRecord_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/blotter/' + $(this).data('blotter'))
                        .then(response => response.json())
                        .then(blotter => {
                            $('#view_title').val(blotter.title);
                            $('#view_date').val(blotter.date);

                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = blotter[fileKey];
                                if (fileName) {
                                    $(`#${linkId}`).attr('href', '/storage/' + fileName).show();
                                    $(`#${inputId}`).val(fileName);
                                    $(`#${inputId}`).show();
                                } else {
                                    $(`#${linkId}`).hide();
                                    $(`#${inputId}`).val('No file').show();
                                }
                            }

                            setLinkOrMessage('file',
                                'link_file',
                                'view_file');
                        });
                });

                $('.editBtn').click(function() {
                    fetch('/blotter/' + $(this).data('blotter'))
                        .then(response => response.json())
                        .then(blotter => {
                            $('#edit_title').val(blotter.title);
                            $('#edit_description').val(blotter.description);
                            $('#edit_date').val(blotter.date); // Format as necessary
                            $('#update-form').attr('action', '/blotter/' + $(this).data(
                                'blotter'));
                        });
                });


                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/blotter/' + $(this).data('blotter'));
                });

            })
        });
    </script>
@endpush
