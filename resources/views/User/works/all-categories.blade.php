@extends('layouts.user')

@section('content')
<section id="works" class="min-vh-100  dark-background py-6">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-6" data-aos="fade-up">
            <h2 class="section-title gradient-text mb-3">Literary Collections</h2>
            <p class="section-subtitle white-text opacity-85">Explore the diverse literary universe of Ragam</p>
        </div>

        <!-- Category Grid -->
        <div class="row g-5 mb-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            @foreach ($categories as $category)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('User.works.category', $category->slug) }}" class="category-card">
                    <div class="card-inner">
                        <div class="card-bg"></div>
                        <div class="card-content">
                            <div class="icon-wrapper">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <h3 class="category-title">{{ $category->name }}</h3>
                            <div class="hover-content">
                                <span class="explore-link">Explore Collection</span>
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
