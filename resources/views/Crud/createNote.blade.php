@vite('resources/css/Crud/createNote.css')

<div class="modal fade" id="addNoteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2"></i>Add New Note
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('CreateNote') }}" method="POST">
                @csrf

                <div class="modal-body">

                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter note title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" rows="4" class="form-control" placeholder="Write your note here...">{{ old('content') }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-add-cancel" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-add-save">
                        <i class="bi bi-plus-circle me-1"></i> Save Note
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addNoteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2"></i>Add New Note
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('CreateNote') }}" method="POST">
                @csrf

                <div class="modal-body">

                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter note title"
                            value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" rows="4" class="form-control" placeholder="Write your note here..." required>{{ old('content') }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-add-cancel" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-add-save">
                        <i class="bi bi-plus-circle me-1"></i> Save Note
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
