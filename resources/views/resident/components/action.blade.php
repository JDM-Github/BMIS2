<div>
    @if (!$resident->status)
        <button type="button" class="btn btn-success acceptBtn" data-bs-toggle="modal" data-bs-target="#acceptModal"
            data-resident="{{ $resident->id }}">
            <i class="fa-solid fa-check"></i>
        </button>

        <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
            data-resident="{{ $resident->id }}">
            <i class="fa-solid fa-times"></i>
        </button>
    @endif

    <button class="btn btn-info viewBtn" data-bs-target="#viewModal" data-bs-toggle="modal"
        data-resident="{{ $resident->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>

    @if ($resident->status)
        <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-resident="{{ $resident->id }}">
            <i class="fa-solid fa-trash"></i>
        </button>
    @endif

</div>
