@extends('layouts.admin')

@section('title', 'Books')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('Admin.book.create') }}" class="btn btn-primary text-end">+ Add Book</a>
    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div class="table-responsive text-wrap">
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
                        @if ($books->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No books found</td>
                            </tr>
                        @else
                            @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Book Thumbnail"
                                            width="50">
                                    </td>
                                    <td>
                                        <div class="form-check form-switch d-flex align-items-center justify-content-center"
                                            style="transform: scale(1.2);">
                                            <input class="form-check-input me-3" type="checkbox"
                                                {{ $book->status ? 'checked' : '' }}
                                                onchange="toggleStatus(this, {{ $book->id }})">
                                            <span id="status-text-{{ $book->id }}"
                                                class="{{ $book->status ? 'text-success' : 'text-danger' }}">
                                                {{ $book->status ? 'ON' : 'OFF' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('Admin.book.edit', $book->id) }}" class="btn btn-primary"
                                                title="Edit">
                                                <i class="bx bx-edit-alt me-1"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger"
                                                onclick="confirmDelete('{{ route('Admin.book.destroy', $book->id) }}')">
                                                <i class="bx bx-trash me-1"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
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
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            }
                        })
                        .then(response => {
                            Swal.fire('Deleted!', 'The book has been deleted.', 'success').then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'There was an issue deleting the book.', 'error');
                        });
                }
            });
        }

        function toggleStatus(element, id) {
            let status = element.checked ? 1 : 0;

            fetch(`/admin/blog/${id}/toggleStatus`, { // Ensure leading "/"
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // ✅ Update UI based on status
                    let statusText = document.getElementById(`status-text-${id}`);
                    if (statusText) {
                        statusText.innerText = status ? "ON" : "OFF"; // Change text
                        statusText.classList.toggle("text-success", status); // Add green color
                        statusText.classList.toggle("text-danger", !status); // Add red color
                    }

                    // Show Toastr Notification on success
                    toastr.success(status ? 'Status is now ON' : 'Status is now OFF');
                })
                .catch(error => {
                    element.checked = !element.checked; // ❌ Revert if there's an error

                    // Show Toastr Notification on error
                    toastr.error('Failed to change status');
                });
        }
    </script>
@endsection
