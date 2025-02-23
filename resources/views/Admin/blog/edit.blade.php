@extends('layouts.admin')

@section('title')
    Edit Blog
@endsection

@section('tiny-mce')
    <x-tinymce-config />
@endsection

@section('content')
    <form action="{{ route('Admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Basic -->
            <div class="col-md-7 mb-4">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Edit Blog</h5>
                    </div>
                    <div class="card-body">
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title', $blog->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <!-- Date Field -->
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date</label>
                                <input class="form-control @error('date') is-invalid @enderror" type="date"
                                    name="date"
                                    value="{{ old('date', $blog->date ? $blog->date->format('Y-m-d') : '') }}"
                                    id="date">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Field -->
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status"
                                    id="status">
                                    <option value="1" {{ $blog->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $blog->status == '0' ? 'selected' : '' }}>Inactive</option>
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
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="image" accept="image/*" onchange="previewImage(event)">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <img id="imagePreview" src="{{ asset('storage/' . $blog->image) }}" alt="Current Image"
                                    class="img-thumbnail" style="max-width: 100px; height: auto;">
                            </div>
                        </div>

                        <textarea id="myeditorinstance" name="content" placeholder="Enter your content">
                            {{ old('content', $blog->content ?? '') }}
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
                            <input class="form-control @error('seo_thumbnail') is-invalid @enderror" type="file"
                                name="seo_thumbnail" id="seo_thumbnail">
                            <img src="{{ asset('storage/' . $blog->seo_thumbnail) }}" class="img-thumbnail"
                                style="max-width: 100px;">
                            @error('seo_thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SEO Keywords -->
                        <div class="mb-3">
                            <label class="form-label" for="seo_keywords">SEO Keywords</label>
                            <input type="text" name="seo_keywords"
                                class="form-control @error('seo_keywords') is-invalid @enderror" id="seo_keywords"
                                value="{{ old('seo_keywords', $blog->seo_keywords) }}">
                            @error('seo_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SEO Description -->
                        <div class="mb-3">
                            <label class="form-label" for="seo_description">SEO Description</label>
                            <textarea name="seo_description" id="seo_description"
                                class="form-control @error('seo_description') is-invalid @enderror">{{ old('seo_description', $blog->seo_description) }}</textarea>
                            @error('seo_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </div>
                </div>
            </div>
            <!-- /SEO -->
        </div>
    </form>


    </div>
@endsection
