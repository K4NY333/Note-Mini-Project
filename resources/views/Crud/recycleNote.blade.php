@vite('resources/css/Crud/recycleNote.css')

<div class="modal fade" id="recycleModal" tabindex="-1" aria-labelledby="recycleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="recycleModalLabel">
          <i class="bi bi-trash me-2"></i> Recycle Bin
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <div id="recycleLoading" class="text-center py-4">
          <div class="spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="mt-2">Loading deleted notes...</p>
        </div>

        <div id="recycleEmpty" class="text-center py-4 d-none">
          <i class="bi bi-trash fs-1"></i>
          <p class="mt-2">Recycle bin is empty.</p>
        </div>

        <div id="recycleList" class="d-none">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Deleted At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="recycleTableBody"></tbody>
          </table>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-recycle-close" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
function loadRecycleBin() {
    const loading = document.getElementById('recycleLoading');
    const empty   = document.getElementById('recycleEmpty');
    const list    = document.getElementById('recycleList');
    const tbody   = document.getElementById('recycleTableBody');

    loading.classList.remove('d-none');
    empty.classList.add('d-none');
    list.classList.add('d-none');
    tbody.innerHTML = '';

    fetch('{{ route("notes.trash") }}', {
        headers: { 'Accept': 'application/json' }
    })
    .then(res => res.json())
    .then(response => {
        loading.classList.add('d-none');

        if (!response.data || response.data.length === 0) {
            empty.classList.remove('d-none');
            return;
        }

        response.data.forEach((note, index) => {
            const row = `
                <tr id="row-${note.id}">
                    <td>${index + 1}</td>
                    <td>${note.title ?? '—'}</td>
                    <td>${note.content ? note.content.substring(0, 60) + '...' : '—'}</td>
                    <td>${new Date(note.deleted_at).toLocaleDateString()}</td>
                    <td>
                        <button class="btn btn-restore" onclick="restoreNote(${note.id})">
                            <i class="bi bi-arrow-counterclockwise"></i> Restore
                        </button>
                    </td>
                </tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        list.classList.remove('d-none');
    })
    .catch(err => {
        loading.classList.add('d-none');
        empty.classList.remove('d-none');
        console.error('Failed to load recycle bin:', err);
    });
}

document.getElementById('recycleModal').addEventListener('show.bs.modal', loadRecycleBin);

function restoreNote(id) {
    fetch(`/notes/${id}/restore`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        document.getElementById(`row-${id}`).remove();

        if (document.getElementById('recycleTableBody').children.length === 0) {
            document.getElementById('recycleList').classList.add('d-none');
            document.getElementById('recycleEmpty').classList.remove('d-none');
        }
    })
    .catch(err => console.error('Restore failed:', err));
}
</script>