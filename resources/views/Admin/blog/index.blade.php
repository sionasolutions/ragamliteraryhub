@extends('layouts.admin')

@section('title')
@endsection

@section('content')

    <div class="d-flex justify-content-end">
        <a href="{{ route('Admin.blog.create') }}" class="btn btn-primary text-end">+ Create Blog</a>
    </div>
    <div class="d-flex justify-content-end m-2">

    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div class="row m-3 my-0 justify-content-between my-3">
                    <div class="d-flex justify-content-between align-items-center col flex-wrap my-2 gap-2">
                        <form method="GET" action="{{ route('Admin.blog.index') }}"
                            class="d-flex justify-content-center align-items-center">
                            <div class="dt-search mt-0 mt-md-6 d-flex justify-content-center align-items-center">
                                <label for="dt-search-0">Search</label>
                                <input type="search" name="search" class="form-control ms-2" id="dt-search-0"
                                    placeholder="Search Blogs" value="{{ request('search') }}">
                            </div>
                        </form>

                        <div class=" justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                            <a href="{{ route('Admin.blog.archived') }}" class="btn btn-warning">View Archived Blogs</a>
                        </div>
                    </div>


                    <div class="table-responsive text-wrap">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($blogs->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">No blogs found</td>
                                    </tr>
                                @else
                                    @foreach ($blogs as $key => $blog)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                                    width="50">
                                            </td>
                                            <td>{{ $blog->date ? $blog->date->format('d/m/Y') : 'N/A' }}</td>
                                            <td>
                                                <div class="form-check form-switch mb-2 d-flex align-items-center justify-content-center"
                                                    style="transform: scale(1.2);">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        {{ $blog->status ? 'checked' : '' }}
                                                        onchange="toggleStatus(this, {{ $blog->id }})">
                                                    <span id="status-text-{{ $blog->id }}"
                                                        class="{{ $blog->status ? 'text-success' : 'text-danger' }}">
                                                        {{ $blog->status ? 'ON' : 'OFF' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- <a href="{{ route('', $blog->slug) }}"
                                                            class="btn btn-success" title="View">
                                                            <i class="bx bx-show me-1"></i>
                                                        </a> --}}
                                                    <a href="{{ route('Admin.blog.edit', $blog->id) }}"
                                                        class="btn btn-primary" title="Edit">
                                                        <i class="bx bx-edit-alt me-1"></i>
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('Admin.blog.destroy', $blog->id) }}')">
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
                    // If confirmed, send a DELETE request
                    axios.delete(url, {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            }
                        })
                        .then(response => {
                            Swal.fire(
                                'Deleted!',
                                'Your blog post has been deleted.',
                                'success'
                            ).then(() => {
                                window.location.reload(); // Reload the page to reflect the changes
                            });
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was an issue deleting the blog post.',
                                'error'
                            );
                        });
                }
            });
        }

        function toggleStatus(element, id) {
            let status = element.checked ? 1 : 0;

            fetch(`/admin/blog/${id}/toggleStatus`, {
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
                    if (data.success) {
                        let statusText = document.getElementById(`status-text-${id}`);
                        if (statusText) {
                            statusText.innerText = status ? "ON" : "OFF";
                            statusText.classList.toggle("text-success", status);
                            statusText.classList.toggle("text-danger", !status);
                        }
                    } else {
                        throw new Error('Something went wrong');
                    }
                })
                .catch(error => {
                    element.checked = !element.checked; // ❌ Revert switch if there's an error
                });
        }
    </script>
@endsection
