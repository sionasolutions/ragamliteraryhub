@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            + Add Category
        </button>
    </div>

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div class="d-flex justify-content-between align-items-center col flex-wrap m-2 gap-2">
                <form method="GET" action="{{ route('Admin.categories.index') }}" 
                      class="d-flex justify-content-center align-items-center">
                    <div class="dt-search mt-0 mt-md-6 d-flex justify-content-center align-items-center">
                        <label for="dt-search-0">Search</label>
                        <input type="search" name="search" class="form-control ms-2" id="dt-search-0"
                               placeholder="Search Categories" value="{{ request('search') }}">
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-primary"
                                                onclick="openEditModal({{ $category->id }})">
                                            <i class="bx bx-edit-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                                onclick="confirmDelete('{{ route('Admin.categories.destroy', $category->id) }}')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No categories found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createCategoryForm" method="POST" action="{{ route('Admin.categories.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Create Category Form Handling
    $('#createCategoryForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        clearErrors(form);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                $('#createCategoryModal').modal('hide');
                window.location.reload();
            },
            error: function(xhr) {
                handleErrors(xhr, form);
            }
        });
    });

    // Open Edit Modal
    function openEditModal(categoryId) {
        $.ajax({
            url: `/admin/categories/${categoryId}/edit`,
            method: "GET",
            success: function(response) {
                $('#edit_name').val(response.name);
                $('#editCategoryForm').attr('action', `/admin/categories/${categoryId}`);
                $('#editCategoryModal').modal('show');
            },
            error: function(xhr) {
                Swal.fire('Error!', 'Failed to load category data', 'error');
            }
        });
    }

    // Edit Category Form Handling
    $('#editCategoryForm').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        clearErrors(form);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                $('#editCategoryModal').modal('hide');
                window.location.reload();
            },
            error: function(xhr) {
                handleErrors(xhr, form);
            }
        });
    });

    // Delete confirmation
    function confirmDelete(url) {
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
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: { _token: "{{ csrf_token() }}" },
                    success: function(response) {
                        Swal.fire('Deleted!', response.message, 'success')
                            .then(() => window.location.reload());
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', xhr.responseJSON?.message || 'Deletion failed', 'error');
                    }
                });
            }
        });
    }

    // Helper functions
    function clearErrors(form) {
        form.find('.is-invalid').removeClass('is-invalid');
        form.find('.invalid-feedback').remove();
    }

    function handleErrors(xhr, form) {
        const errors = xhr.responseJSON?.errors;
        if (errors) {
            Object.entries(errors).forEach(([field, messages]) => {
                const input = form.find(`[name="${field}"]`);
                input.addClass('is-invalid');
                input.after(`<div class="invalid-feedback">${messages[0]}</div>`);
            });
        }
    }

    // Reset modals on close
    $('.modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        clearErrors($(this).find('form'));
    });
</script>
@endsection