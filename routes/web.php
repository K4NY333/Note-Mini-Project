    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\NoteController;
    use App\Http\Controllers\UserLoginController;

    // If you have a login route without a name, add ->name('login')
    Route::get('/index', function () {return view('index');})->name('login');
    Route::get('/dashboard', [NoteController::class, 'ReadNote'])->middleware(['web', 'auth'])->name('dashboard');
    Route::get('/notes', function () {return view('notes');})->name('notes');


    //login/signup
    Route::post('/index/login', [UserLoginController::class, 'login'])->name('login.submit');
    Route::post('/index/register', [UserLoginController::class, 'CreateUser'])->name('register.submit');
    Route::get('/index/logout', [UserLoginController::class, 'logout'])->name('logout.submit');

    //notes
    Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [NoteController::class, 'ReadNote'])->name('dashboard');
    Route::post('/notes/add', [NoteController::class, 'CreateNote'])->name('notes.create');
    Route::put('/notes/update/{id}', [NoteController::class, 'UpdateNote'])->name('notes.update');
    Route::delete('/notes/delete/{id}', [NoteController::class, 'DeleteNote'])->name('notes.delete');
    Route::get('/notes/recycle', [NoteController::class, 'RecycleBin'])->name('notes.trash');
    Route::patch('/notes/{id}/restore', [NoteController::class, 'RestoreNote'])->name('notes.restore');
    Route::get('/note/pagination', [NoteController::class, 'Pagination'])->name('notes.pagination');
    Route::get('/notes/search', [NoteController::class, 'SearchNote'])->name('SearchNote');
});