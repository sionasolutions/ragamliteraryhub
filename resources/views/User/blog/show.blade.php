@extends('layouts.user')

@section('title', $blog->title)

@section('meta')
    <meta name="description" content="{{ $blog->seo_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta name="keywords" content="{{ $blog->seo_keywords }}">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->seo_description ?? Str::limit(strip_tags($blog->content), 160) }}">
    <meta property="og:image" content="{{ asset($blog->seo_thumbnail ?? ($blog->image ?? 'default-image.jpg')) }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection


@section('content')
    <div class="container mt-4">
        <!-- Blog Post -->
        <div class="post mb-4">
            <h2 class="text-center">{{ $blog->title }}</h2>
            <p class="text-muted text-center">Posted on {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }}r</p>

            <!-- Blog Image -->
            <img src="{{ asset('storage/' . $blog->image ?? 'default-image.jpg') }}" class="img-fluid mx-auto d-block mb-3 blog-image"
                alt="{{ $blog->title }}" height="300" width="300">

            <!-- Hidden content -->
            <div class="extra-content">
                {!! $blog->content !!}
            </div>


        </div>
    </div>
@endsection
