@extends('layouts.admin')

@section('title')
    Create Blog
@endsection

@section('tiny-mce')
<x-tinymce-config/>
@endsection

@section('content')
        <form action="{{ route('Admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Basic -->
                <div class="col-md-7 mb-4">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-start align-items-center">
                            <h5 class="mb-0">Add New Blog</h5>
                        </div>
                        <div class="card-body">
        
                            <!-- Title Field -->
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="row mb-3">
                                <!-- Date Field -->
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input class="form-control @error('date') is-invalid @enderror" type="date" name="date" value="{{ old('date') }}" id="date">
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                <!-- Status Field -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <!-- Image Upload -->
                            <div class="mb-3 row align-items-center">
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <img id="imagePreview" src="#" alt="Image Preview" class="img-thumbnail" style="display: none; max-width: 100px; height: auto;">
                                </div>
                            </div>
        
                            <textarea id="myeditorinstance" name="content" placeholder="Enter your content">
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- /Basic -->
        
                <!-- SEO -->
                <div class="col-md-5 mb-4">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-start align-items-center">
                            <h5 class="mb-0">SEO Configuration</h5>
                        </div>
                        <div class="card-body">
                            <!-- SEO Thumbnail -->
                            <div class="mb-3">
                                <label for="seo_thumbnail" class="form-label">Thumbnail</label>
                                <input class="form-control @error('seo_thumbnail') is-invalid @enderror" type="file" name="seo_thumbnail" id="seo_thumbnail">
                                @error('seo_thumbnail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <!-- SEO Keywords -->
                            <div class="mb-3">
                                <label class="form-label" for="seo_keywords">SEO Keywords</label>
                                <input type="text" name="seo_keywords" class="form-control @error('seo_keywords') is-invalid @enderror" id="seo_keywords" placeholder="SEO Keywords" value="{{ old('seo_keywords') }}">
                                @error('seo_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <!-- SEO Description -->
                            <div class="mb-3">
                                <label class="form-label" for="seo_description">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" class="form-control @error('seo_description') is-invalid @enderror" placeholder="SEO Description">{{ old('seo_description') }}</textarea>
                                @error('seo_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- /SEO -->
            </div>
        </form>
        
    </div>
@endsection

@section('js')
    function previewImage(event) {
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

@endsection
