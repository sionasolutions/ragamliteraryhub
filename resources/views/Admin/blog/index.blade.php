@extends('layouts.admin')

@section('title')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="fw-bold mb-4"><span class="text-muted fw-light">Extended UI /</span> Text Divider</h6>
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
                            <div class="dt-search mt-0 mt-md-6 d-flex justify-content-center align-items-center">
                                <label for="dt-search-0">Search</label>
                                <input type="search" class="form-control ms-2" id="dt-search-0" placeholder="">
                            </div>
                            <div class=" justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                                <button type="button" class="btn btn-info  text-end"><i class="bx bxs-box"></i>
                                    Archived</button>
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
                                                        <input class="form-check-input" type="checkbox"
                                                            {{ $blog->status ? 'checked' : '' }}
                                                            onchange="toggleStatus({{ $blog->id }})">
                                                        <span
                                                            class="ms-2">{{ $blog->status ? 'Published' : 'Draft' }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ route('blogs.show', $blog->slug) }}"
                                                            class="btn btn-success" title="View">
                                                            <i class="bx bx-show me-1"></i>
                                                        </a>
                                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                                            class="btn btn-primary" title="Edit">
                                                            <i class="bx bx-edit-alt me-1"></i>
                                                        </a>
                                                        <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                                <i class="bx bx-trash me-1"></i>
                                                            </button>
                                                        </form>
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
function toggleSwitch(element, id) {
    let status = element.checked ? 1 : 0;

    fetch(`/blog/${id}/toggle-status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ status: status })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
    })
    .catch(error => console.error('Error:', error));
}
@endsection
