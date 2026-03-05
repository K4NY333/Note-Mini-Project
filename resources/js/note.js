const addNoteBtn = document.getElementById('addNoteBtn');
const noteFormContainer = document.getElementById('noteFormContainer');
const cancelBtn = document.getElementById('cancelBtn');
const addNoteForm = document.getElementById('add-note-form');
const notesContainer = document.getElementById('notes-container');

const editFormContainer = document.getElementById('editFormContainer');
const editNoteForm = document.getElementById('edit-note-form');
const cancelEditBtn = document.getElementById('cancelEditBtn');

const historyBtn = document.getElementById('historyBtn');
const historyModal = document.getElementById('historyModal');
const closeModal = document.getElementById('closeModal');

const searchBtn = document.getElementById('searchBtn');
const searchInput = document.getElementById('searchInput');

// Show add note form
addNoteBtn.addEventListener('click', () => {
    noteFormContainer.style.display = 'block';
    editFormContainer.style.display = 'none';
});

// Hide add note form
cancelBtn.addEventListener('click', () => {
    noteFormContainer.style.display = 'none';
    addNoteForm.reset();
});

// Add new note
addNoteForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(addNoteForm);
    
    try {
        const response = await fetch('/notes/add', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData
        });

        const result = await response.json();

        if (response.ok) {
            const emptyMessage = document.getElementById('empty-message');
            if (emptyMessage) {
                emptyMessage.remove();
            }

            const noteCard = document.createElement('div');
            noteCard.className = 'note-card';
            noteCard.id = `note-${result.note.id}`;
            noteCard.innerHTML = `
                <div class="note-title">${result.note.title}</div>
                <div class="note-content">${result.note.content}</div>
                <div class="note-date">${new Date(result.note.created_at).toLocaleString()}</div>
                <button class="edit-btn" data-id="${result.note.id}">Edit</button>
                <button class="delete-btn" data-id="${result.note.id}">Delete</button>
            `;

            notesContainer.appendChild(noteCard);
            addNoteForm.reset();
            noteFormContainer.style.display = 'none';
            
            attachNoteEventListeners(noteCard);
        } else {
            alert('Error adding note: ' + (result.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to add note. Please try again.');
    }
});

// Edit note - show form with existing data
function showEditForm(noteId) {
    const noteCard = document.getElementById(`note-${noteId}`);
    const title = noteCard.querySelector('.note-title').textContent;
    const content = noteCard.querySelector('.note-content').textContent;

    document.getElementById('edit-note-id').value = noteId;
    document.getElementById('edit-note-title').value = title;
    document.getElementById('edit-note-content').value = content;

    editFormContainer.style.display = 'block';
    noteFormContainer.style.display = 'none';
}

// Hide edit form
cancelEditBtn.addEventListener('click', () => {
    editFormContainer.style.display = 'none';
    editNoteForm.reset();
});

// Update note
editNoteForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const noteId = document.getElementById('edit-note-id').value;
    const formData = new FormData(editNoteForm);
    
    try {
        const response = await fetch(`/notes/update/${noteId}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                title: formData.get('title'),
                content: formData.get('content')
            })
        });

        const result = await response.json();

        if (response.ok) {
            const noteCard = document.getElementById(`note-${noteId}`);
            noteCard.querySelector('.note-title').textContent = formData.get('title');
            noteCard.querySelector('.note-content').textContent = formData.get('content');

            editFormContainer.style.display = 'none';
            editNoteForm.reset();
        } else {
            alert('Error updating note: ' + (result.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to update note. Please try again.');
    }
});

// Delete note
async function deleteNote(noteId) {
    if (!confirm('Are you sure you want to delete this note?')) {
        return;
    }

    try {
        const response = await fetch(`/notes/delete/${noteId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            }
        });

        const result = await response.json();

        if (response.ok) {
            const noteCard = document.getElementById(`note-${noteId}`);
            noteCard.remove();

            const remainingNotes = notesContainer.querySelectorAll('.note-card');
            if (remainingNotes.length === 0) {
                notesContainer.innerHTML = '<div class="empty" id="empty-message">No notes available.</div>';
            }
        } else {
            alert('Error deleting note: ' + (result.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to delete note. Please try again.');
    }
}

// Search notes
searchBtn.addEventListener('click', async () => {
    const searchTerm = searchInput.value.trim();
    
    if (!searchTerm) {
        location.reload();
        return;
    }

    try {
        const response = await fetch(`/notes/search/${encodeURIComponent(searchTerm)}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            }
        });

        const result = await response.json();

        if (response.ok) {
            notesContainer.innerHTML = '';

            if (result.data.length === 0) {
                notesContainer.innerHTML = '<div class="empty">No notes found.</div>';
            } else {
                result.data.forEach(note => {
                    const noteCard = document.createElement('div');
                    noteCard.className = 'note-card';
                    noteCard.id = `note-${note.id}`;
                    noteCard.innerHTML = `
                        <div class="note-title">${note.title}</div>
                        <div class="note-content">${note.content}</div>
                        <div class="note-date">${new Date(note.created_at).toLocaleString()}</div>
                        <button class="edit-btn" data-id="${note.id}">Edit</button>
                        <button class="delete-btn" data-id="${note.id}">Delete</button>
                    `;
                    notesContainer.appendChild(noteCard);
                    attachNoteEventListeners(noteCard);
                });
            }
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to search notes. Please try again.');
    }
});

// View trash/history
historyBtn.addEventListener('click', async () => {
    try {
        const response = await fetch('/notes/trash', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            }
        });

        const result = await response.json();
        const trashContainer = document.getElementById('trash-container');
        trashContainer.innerHTML = '';

        if (result.deleted_notes && result.deleted_notes.length > 0) {
            result.deleted_notes.forEach(note => {
                const noteCard = document.createElement('div');
                noteCard.className = 'note-card';
                noteCard.innerHTML = `
                    <div class="note-title">${note.title}</div>
                    <div class="note-content">${note.content}</div>
                    <div class="note-date">Deleted: ${new Date(note.deleted_at).toLocaleString()}</div>
                `;
                trashContainer.appendChild(noteCard);
            });
        } else {
            trashContainer.innerHTML = '<div class="empty">No deleted notes found.</div>';
        }

        historyModal.style.display = 'block';
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to load trash. Please try again.');
    }
});

// Close modal
closeModal.addEventListener('click', () => {
    historyModal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === historyModal) {
        historyModal.style.display = 'none';
    }
});

// Attach event listeners to note cards
function attachNoteEventListeners(noteCard) {
    const editBtn = noteCard.querySelector('.edit-btn');
    const deleteBtn = noteCard.querySelector('.delete-btn');

    editBtn.addEventListener('click', () => {
        showEditForm(editBtn.getAttribute('data-id'));
    });

    deleteBtn.addEventListener('click', () => {
        deleteNote(deleteBtn.getAttribute('data-id'));
    });
}

// Attach listeners to existing notes on page load
document.querySelectorAll('.note-card').forEach(noteCard => {
    attachNoteEventListeners(noteCard);
});

// Search on Enter key
searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        searchBtn.click();
    }
});