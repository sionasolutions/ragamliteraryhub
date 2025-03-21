@extends('layouts.admin')

@section('title', 'Archived Works')

@section('content')
    <div class="d-flex justify-content-end mb-3 gap-2">
        <a href="{{ route('Admin.works.index') }}" class="btn btn-primary">
            <i class="bx bx-arrow-back"></i> Back to Works
        </a>
    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Thumbnail</th>
                            <th>Archived Date</th>
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
                                    <img src="{{ asset('storage/' . $work->image_path) }}" alt="Work Thumbnail" width="50">
                                </td>
                                <td>{{ $work->deleted_at->format('M d, Y H:i') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-success"
                                            onclick="confirmRestore('{{ route('Admin.works.restore', $work->id) }}')">
                                            <i class="bx bx-reset"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmForceDelete('{{ route('Admin.works.forceDelete', $work->id) }}')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No archived works found</td>
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
    function confirmRestore(url) {
        Swal.fire({
            title: 'Restore Work?',
            text: "This will restore the work to active list.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(url, {
                    _token: document.querySelector('meta[name="csrf-token"]').content
                })
                .then(() => {
                    Swal.fire('Restored!', 'The work has been restored.', 'success')
                        .then(() => window.location.reload());
                })
                .catch(() => {
                    Swal.fire('Error!', 'There was an issue restoring the work.', 'error');
                });
            }
        });
    }

    function confirmForceDelete(url) {
        Swal.fire({
            title: 'Delete Permanently?',
            text: "This cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete forever!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(() => {
                    Swal.fire('Deleted!', 'The work has been permanently deleted.', 'success')
                        .then(() => window.location.reload());
                })
                .catch(() => {
                    Swal.fire('Error!', 'There was an issue deleting the work.', 'error');
                });
            }
        });
    }
</script>
@endsection