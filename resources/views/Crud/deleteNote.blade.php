@vite('resources/css/Crud/deleteNote.css')

<div class="modal fade" id="deleteModal-{{ $note->id }}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-trash me-2"></i>Move to Trash
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <i class="bi bi-journal-x display-4 mb-3 d-block"></i>
        <p>Are you sure you want to delete</p>
        <strong>{{ $note->title }}</strong>
        <p class="delete-warning mt-2">This note will be moved to trash.</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-delete-cancel" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-1"></i> Cancel
        </button>
        <form action="{{ route('DeleteNote', $note->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-delete-confirm">
            <i class="bi bi-trash me-1"></i> Yes, Delete
          </button>
        </form>
      </div>

    </div>
  </div>
</div>