<div>
    <button class="btn btn-{{ $walkIn->isArchived ? 'success' : 'danger' }} archiveBtn"
        data-bs-target="#{{ $walkIn->isArchived ? 'unarchiveModal' : 'archiveModal' }}" data-bs-toggle="modal"
        data-document="{{ $walkIn->id }}">
        <i class="fa-solid fa-{{ $walkIn->isArchived ? 'undo-alt' : 'archive' }}"></i>
        {{ $walkIn->isArchived ? 'Unarchive' : 'Archive' }}
    </button>
</div>
