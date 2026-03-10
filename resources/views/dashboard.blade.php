<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/dashboard.css')
    <title>DashBoard</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <p class="navbar-brand fw-semibold">Notes</p>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">

                {{-- Left nav links --}}
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>

                <form class="d-flex mx-auto" role="search" action="{{ url('/notes/search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="param" placeholder="Search"
                        aria-label="Search" value="{{ request('param') }}" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <div class="d-flex align-items-center gap-2 ms-auto">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username ?? 'User') }}&background=0D8ABC&color=fff&size=36&rounded=true"
                                alt="{{ Auth::user()->username ?? 'User' }}" width="36" height="36"
                                class="rounded-circle border border-2 border-secondary" />
                            <span
                                class="ms-2 d-none d-lg-inline fw-medium">{{ Auth::user()->username ?? 'Guest' }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout.submit') }}">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid mt-4">
            <div class="row">

                <div class="col-12 col-md-3 col-lg-2 mb-4">
                    <div class="d-flex flex-column gap-3">

                        <button type="button" class="btn btn-success w-100" data-bs-toggle="modal"
                            data-bs-target="#addNoteModal">
                            <i class="bi bi-plus-circle me-1"></i> Add Note
                        </button>

                        <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                            data-bs-target="#recycleModal">
                            <i class="bi bi-trash me-1"></i> Recycle Bin
                        </button>

                    </div>
                </div>

                <div class="col-12 col-md-9 col-lg-10">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="bi bi-x-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row g-3">
                        @forelse($notes as $note)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm">
                                    @include('Crud.readNote')
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <p class="mb-0">No notes found.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $notes->links() }}
                    </div>
                </div>

            </div>
        </div>

        @include('Crud.createNote')
        @include('Crud.recycleNote')

        <script>
            function toggleEdit(id) {
                const view = document.getElementById('view-' + id);
                const edit = document.getElementById('edit-' + id);
                view.style.display = view.style.display === 'none' ? 'block' : 'none';
                edit.style.display = edit.style.display === 'none' ? 'block' : 'none';
            }
        </script>
    </main>

    @foreach ($notes as $note)
        @include('Crud.deleteNote')
    @endforeach


</body>

</html>
