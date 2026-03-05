@vite('resources/css/Crud/updateNote.css')

<div id="edit-{{ $note->id }}" style="display:none;">
  <form action="{{ route('notes.update', $note->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card-header edit-card-header">
      Editing Note #{{ $loop->iteration }}
    </div>

    <div class="card-body edit-card-body">

      <div class="mb-3">
        <label class="edit-form-label">Title</label>
        <input
          type="text"
          name="title"
          value="{{ $note->title }}"
          class="edit-form-control"
          required
        />
      </div>

      <div class="mb-2">
        <label class="edit-form-label">Content</label>
        <textarea
          name="content"
          rows="4"
          class="edit-form-control"
          required
        >{{ $note->content }}</textarea>
      </div>

    </div>

    <div class="card-footer edit-card-footer">
      <button type="button" onclick="toggleEdit({{ $note->id }})" class="btn btn-sm btn-edit-cancel">
        <i class="bi bi-x-circle"></i> Cancel
      </button>
      <button type="submit" class="btn btn-sm btn-edit-save">
        <i class="bi bi-check-circle"></i> Save
      </button>
    </div>

  </form>
</div>