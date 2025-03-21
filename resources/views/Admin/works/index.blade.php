@extends('layouts.admin')

@section('title', 'Works')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('Admin.works.create') }}" class="btn btn-primary">+ Add Work</a>
    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div class="d-flex justify-content-between align-items-center col flex-wrap m-2 gap-2">
                <form method="GET" action="{{ route('Admin.works.index') }}"
                    class="d-flex justify-content-center align-items-center">
                    <div class="dt-search mt-0 mt-md-6 d-flex justify-content-center align-items-center">
                        <label for="dt-search-0">Search</label>
                        <input type="search" name="search" class="form-control ms-2" id="dt-search-0"
                            placeholder="Search Works" value="{{ request('search') }}">
                    </div>
                </form>

                <div class=" justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                    <a href="{{ route('Admin.works.archived') }}" class="btn btn-warning">View Archived Works</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($works as $key => $work)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $work->title }}</td>
                                <td>{{ $work->category->name ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $work->image_path) }}" alt="Work Thumbnail"
                                        width="50">
                                </td>
                                <td>
                                    <div class="form-check form-switch d-flex align-items-center justify-content-center"
                                        style="transform: scale(1.2);">
                                        <input class="form-check-input me-3" type="checkbox"
                                            {{ $work->is_active ? 'checked' : '' }}
                                            onchange="toggleStatus(this, {{ $work->id }})">
                                        <span id="status-text-{{ $work->id }}"
                                            class="{{ $work->is_active ? 'text-success' : 'text-danger' }}">
                                            {{ $work->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('Admin.works.edit', $work->id) }}" class="btn btn-primary"
                                            title="Edit">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete('{{ route('Admin.works.destroy', $work->id) }}')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No works found</td>
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
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            }
                        })
                        .then(() => {
                            Swal.fire('Deleted!', 'The work has been deleted.', 'success').then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(() => {
                            Swal.fire('Error!', 'There was an issue deleting the work.', 'error');
                        });
                }
            });
        }

        function toggleStatus(element, id) {
            const status = element.checked;
            axios.post(`/admin/works/${id}/toggleStatus`, {
                    is_active: status ? 1 : 0
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    const statusText = document.getElementById(`status-text-${id}`);
                    if (statusText) {
                        statusText.innerText = response.data.status ? "Active" : "Inactive";
                        statusText.className = response.data.status ? 'text-success' : 'text-danger';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    element.checked = !status;
                    Swal.fire('Error!', 'Failed to update status', 'error');
                });
        }
    </script>
@endsection
