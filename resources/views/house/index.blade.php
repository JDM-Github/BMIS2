@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>House</div>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    {{-- VIEW HOUSE --}}
    @include('house.modals.view')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['house_dataTable'] = $(
                    '#house_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/house/' + $(this).data('house'))
                        .then(response => response.json())
                        .then(house => {

                            const mapUrl = 'https://maps.google.com/maps?q=' +
                                encodeURIComponent(house.address + ' ' +
                                    house.barangay + ' ' +
                                    house.municipality + ' ' +
                                    house.province) +
                                '&output=embed';

                            $('#map').attr('src', mapUrl);

                            console.log(mapUrl);
                        });
                });
            })
        });
    </script>
@endpush
