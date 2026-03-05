@vite('resources/css/Crud/readNote.css')

  <div id="view-{{ $note->id }}">
  <div class="card-header bg-primary text-white">
    Note #{{ $loop->iteration }}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $note->title ?? 'Untitled' }}</h5>
    <p class="card-text">{{ $note->content ?? 'No content available.' }}</p>
  </div>
  <div class="card-footer d-flex justify-content-between align-items-center">
    <small class="text-muted">
      <i class="bi bi-clock"></i>
      {{ $note->created_at ? \Carbon\Carbon::parse($note->created_at)->diffForHumans() : 'No date' }}
    </small>
    <div class="btn-group btn-group-sm">
      <button onclick="toggleEdit({{ $note->id }})" class="btn btn-outline-primary">
        <i class="bi bi-pencil-square"></i> Edit
      </button>
      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $note->id }}">
        <i class="bi bi-trash"></i> Delete
      </button>
    </div>
  </div>
</div>
@include('Crud.updateNote')
