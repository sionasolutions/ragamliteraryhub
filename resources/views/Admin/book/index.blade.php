@extends('layouts.admin')

@section('title', 'Books')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('Admin.book.create') }}" class="btn btn-primary">+ Add Book</a>
    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div class="d-flex justify-content-between align-items-center col flex-wrap m-2 gap-2">
                <form method="GET" action="{{ route('Admin.book.index') }}"
                    class="d-flex justify-content-center align-items-center">
                    <div class="dt-search mt-0 mt-md-6 d-flex justify-content-center align-items-center">
                        <label for="dt-search-0">Search</label>
                        <input type="search" name="search" class="form-control ms-2" id="dt-search-0"
                            placeholder="Search Books" value="{{ request('search') }}">
                    </div>
                </form>

                <div class=" justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                    <a href="{{ route('Admin.book.archived') }}" class="btn btn-warning">View Archived Books</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $key => $book)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Thumbnail" width="50">
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex align-items-center justify-content-center" style="transform: scale(1.2);">
                                        <input class="form-check-input me-3" type="checkbox" {{ $book->status ? 'checked' : '' }}
                                            onchange="toggleStatus(this, {{ $book->id }})">
                                        <span id="status-text-{{ $book->id }}" class="{{ $book->status ? 'text-success' : 'text-danger' }}">
                                            {{ $book->status ? 'ON' : 'OFF' }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('Admin.book.edit', $book->id) }}" class="btn btn-primary" title="Edit">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete('{{ route('Admin.book.destroy', $book->id) }}')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No books found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(url, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(() => {
                        Swal.fire('Deleted!', 'The book has been deleted.', 'success').then(() => {
                            window.location.reload();
                        });
                    })
                    .catch(() => {
                        Swal.fire('Error!', 'There was an issue deleting the book.', 'error');
                    });
                }
            });
        }

        function toggleStatus(element, id) {
            let status = element.checked ? 1 : 0;
            fetch(`/admin/book/${id}/toggleStatus`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                let statusText = document.getElementById(`status-text-${id}`);
                if (statusText) {
                    statusText.innerText = status ? "ON" : "OFF";
                    statusText.classList.toggle("text-success", status);
                    statusText.classList.toggle("text-danger", !status);
                }
            })
            .catch(() => {
                element.checked = !element.checked;
            });
        }
    </script>
@endsection
