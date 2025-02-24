@extends('layouts.admin')

@section('title', 'Edit Media')

@section('content')
    <form action="{{ route('Admin.media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Media</h5>
                    </div>
                    <div class="card-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $media->title) }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Thumbnail -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            @error('thumbnail')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @if ($media->thumbnail)
                                <div class="mt-2 p-2 border rounded">
                                    <label>Current Thumbnail:</label>
                                    <img src="{{ asset('storage/'.$media->thumbnail) }}" alt="Current Thumbnail" class="img-thumbnail" width="200">

                                </div>
                            @endif
                        </div>

                        <!-- Media Link -->
                        <div class="mb-3">
                            <label class="form-label" for="link">Media Link</label>
                            <input type="url" name="link" class="form-control" id="link" value="{{ old('link', $media->link) }}" placeholder="Enter media link">
                            @error('link')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('Admin.media.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
