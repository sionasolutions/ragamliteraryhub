@extends('layouts.admin')

@section('title')
    Edit Work
@endsection

@section('content')
    <form action="{{ route('Admin.works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Basic Work Details -->
            <div class="col-md-7 mb-4">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Edit Work</h5>
                    </div>
                    <div class="card-body">

                        <!-- Title Field -->
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" placeholder="Work Title" 
                                   value="{{ old('title', $work->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <!-- Category Selection -->
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ old('category_id', $work->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Field -->
                            <div class="col-md-6">
                                <label for="is_active" class="form-label">Status</label>
                                <select class="form-select @error('is_active') is-invalid @enderror" 
                                        name="is_active" id="is_active">
                                    <option value="1" {{ old('is_active', $work->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $work->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Work Image Upload -->
                        <div class="mb-3 row align-items-center">
                            <div class="col-md-6">
                                <label for="image" class="form-label">Work Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" 
                                       name="image" id="image" accept="image/*" onchange="previewWorkImage(event)">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                            </div>
                            <div class="col-md-6">
                                <img id="imagePreview" src="#" alt="Image Preview" 
                                     class="img-thumbnail" style="display: none; max-width: 100px; height: auto;">
                            </div>
                        </div>

                        <!-- Work Description -->
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="description" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      placeholder="Work description">{{ old('description', $work->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Basic -->

            <!-- SEO Section -->
            <div class="col-md-5 mb-4">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">SEO Configuration</h5>
                    </div>
                    <div class="card-body">
                        <!-- SEO Thumbnail -->
                        <div class="mb-3">
                            <label for="seo_thumbnail" class="form-label">SEO Thumbnail</label>
                            <input class="form-control @error('seo_thumbnail') is-invalid @enderror" 
                                   type="file" name="seo_thumbnail" id="seo_thumbnail">
                            @error('seo_thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($work->seo_thumbnail)
                                <div class="mt-2">
                                    <small>Current SEO Thumbnail:</small>
                                    <img src="{{ asset('storage/' . $work->seo_thumbnail) }}" 
                                         alt="Current SEO Thumbnail" 
                                         class="img-thumbnail mt-1" 
                                         style="max-width: 100px;">
                                </div>
                            @endif
                        </div>

                        <!-- SEO Keywords -->
                        <div class="mb-3">
                            <label class="form-label" for="seo_keywords">SEO Keywords</label>
                            <input type="text" name="seo_keywords" 
                                   class="form-control @error('seo_keywords') is-invalid @enderror" 
                                   id="seo_keywords" 
                                   placeholder="SEO Keywords" 
                                   value="{{ old('seo_keywords', $work->seo_keywords) }}">
                            @error('seo_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SEO Description -->
                        <div class="mb-3">
                            <label class="form-label" for="seo_description">SEO Description</label>
                            <textarea name="seo_description" id="seo_description" 
                                      class="form-control @error('seo_description') is-invalid @enderror" 
                                      placeholder="SEO Description">{{ old('seo_description', $work->seo_description) }}</textarea>
                            @error('seo_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
            <!-- /SEO -->
        </div>
    </form>
@endsection

@section('js')
<script>
    function previewWorkImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById("imagePreview");
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }

    // Initialize form with existing values
    document.addEventListener('DOMContentLoaded', function() {
        // Show current image if exists
        @if($work->image_path)
            document.getElementById('imagePreview').src = "{{ asset('storage/' . $work->image_path) }}";
            document.getElementById('imagePreview').style.display = "block";
        @endif
    });
</script>
@endsection