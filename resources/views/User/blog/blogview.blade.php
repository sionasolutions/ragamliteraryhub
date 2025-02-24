@extends('layouts.user')

@section('title', 'blogs')

@section('content')
    <!-- Resume Section -->
    <section id="resume" class="resume section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Blogs</h2>

            <div class="blog-container">
                @foreach ($blogs as $blog)
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="blog-content">
                            <span class="blog-date">{{ $blog->date->format('d F Y') }}</span>
                            <div class="blog-title">{{ $blog->title }}</div>
                            <div class="blog-text">{{ Str::limit(strip_tags($blog->content), 100) }}</div>
                            <a href="{{ route('User.blog.show', $blog->slug) }}" class="blog-button">READ MORE</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- End Section Title -->
    @endsection
