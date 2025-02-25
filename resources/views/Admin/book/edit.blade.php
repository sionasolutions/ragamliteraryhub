@extends('layouts.admin')

@section('title')
    Edit Book
@endsection

@section('tiny-mce')
    <x-tinymce-config />
@endsection

@section('content')
    <form action="{{ route('Admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Basic -->
            <div class="col-md-7 mb-4">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Edit Book</h5>
                    </div>
                    <div class="card-body">
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title', $book->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <!-- Publication Date -->
                            <div class="col-md-6">
                                <label for="publication_date" class="form-label">Publication Date</label>
                                <input class="form-control @error('publication_date') is-invalid @enderror" type="date"
                                    name="publication_date"
                                    value="{{ old('publication_date', $book->publication_date ? $book->publication_date->format('Y-m-d') : '') }}"
                                    id="publication_date">
                                @error('publication_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Field -->
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status"
                                    id="status">
                                    <option value="1" {{ $book->status == '1' ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ $book->status == '0' ? 'selected' : '' }}>Unavailable</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Cover Image Upload -->
                        <div class="mb-3 row align-items-center">
                            <div class="col-md-6">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input class="form-control @error('cover_image') is-invalid @enderror" type="file"
                                    name="cover_image" id="cover_image" accept="image/*" onchange="previewImage(event)">
                                @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <img id="imagePreview" src="{{ asset('storage/' . $book->image) }}" alt="Current Cover Image"
                                    class="img-thumbnail" style="max-width: 100px; height: auto;">
                            </div>
                        </div>

                        <textarea id="myeditorinstance" name="description" placeholder="Enter book description">
                            {{ old('description', $book->description ?? '') }}
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
                            <img src="{{ asset('storage/' . $book->seo_thumbnail) }}" class="img-thumbnail"
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
                                value="{{ old('seo_keywords', $book->seo_keywords) }}">
                            @error('seo_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SEO Description -->
                        <div class="mb-3">
                            <label class="form-label" for="seo_description">SEO Description</label>
                            <textarea name="seo_description" id="seo_description"
                                class="form-control @error('seo_description') is-invalid @enderror">{{ old('seo_description', $book->seo_description) }}</textarea>
                            @error('seo_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </div>
                </div>
            </div>
            <!-- /SEO -->
        </div>
    </form>
@endsection
