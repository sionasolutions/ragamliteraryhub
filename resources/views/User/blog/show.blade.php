@extends('layouts.user')

@section('title', $blog->title)

@section('meta')
    <meta name="description" content="{{ $blog->seo_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords" content="{{ $blog->seo_keywords }}">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->seo_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta property="og:image" content="{{ asset($blog->seo_thumbnail ?? $blog->image ?? 'default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection


@section('content')
<div class="container my-5">
    <div class="blog-details">
        <h1 class="blog-title">{{ $blog->title }}</h1>
        <p class="blog-date text-muted">{{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}</p>
        <img src="{{ asset('storage/'.$blog->image ?? 'default-image.jpg') }}" class="img-fluid my-3" alt="{{ $blog->title }}">

        <div class="blog-content">
            {!! $blog->content !!}  <!-- Displaying HTML content safely -->
        </div>

    </div>
</div>
@endsection