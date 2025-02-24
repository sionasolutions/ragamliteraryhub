@extends('layouts.admin')

@section('title', 'Create News')

@section('content')
    <form action="{{ route('Admin.media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add News</h5>
                    </div>
                    <div class="card-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>

                        <!-- Thumbnail -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
                        </div>

                        <!-- Link -->
                        <div class="mb-3">
                            <label class="form-label" for="link">News Link</label>
                            <input type="url" name="link" class="form-control" id="link" placeholder="https://example.com" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
