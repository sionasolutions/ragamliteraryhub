@extends('layouts.admin')

@section('title')
@endsection

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('Admin.news.create') }}" class="btn btn-primary text-end">+ Create news</a>
    </div>
    <div class="d-flex justify-content-end m-2">
    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div class="row m-3 my-0 justify-content-between my-3">
                    <div class="d-flex justify-content-between align-items-center col flex-wrap my-2 gap-2">
                        <form method="GET" action="{{ route('Admin.news.index') }}"
                            class="d-flex justify-content-center align-items-center">
                            <div class="dt-search mt-0 mt-md-6 d-flex justify-content-center align-items-center">
                                <label for="dt-search-0">Search</label>
                                <input type="search" name="search" class="form-control ms-2" id="dt-search-0"
                                    placeholder="Search news" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive text-wrap">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if ($news->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No news found</td>
                                    </tr>
                                @else
                                    @foreach ($news as $key => $new)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $new->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="new Image"
                                                    width="50">
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('Admin.news.edit', $new->id) }}"
                                                        class="btn btn-primary" title="Edit">
                                                        <i class="bx bx-edit-alt me-1"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ route('Admin.news.destroy', $new->id) }}')">
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
                                    'content'),
                            }
                        })
                        .then(response => {
                            Swal.fire('Deleted!', response.data.message, 'success')
                                .then(() => {
                                    window.location.reload();
                                });
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                error.response?.data?.message || 'There was an issue deleting the post.',
                                'error'
                            );
                        });
                }
            });
        }
    </script>
@endsection
