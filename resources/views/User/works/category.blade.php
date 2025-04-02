@extends('layouts.user')

@section('content')
<section class="category-works min-vh-100 flex-grow-1 dark-background py-5">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb gold-breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('User.works.all-categories') }}" class="gold-link">All Works</a>
                </li>
                <li class="breadcrumb-item active gold-text" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="display-4 gold-text fw-bold mb-0 border-bottom  pb-2">{{ $category->name }}</h1>
        </div>

        <!-- Works Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($works as $work)
                <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div class="card h-100 border-gold hover-scale bg-transparent">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('storage/' . $work->image_path) }}" 
                                 class="card-img-top object-fit-cover work-image" 
                                 alt="{{ $work->title }}"
                                 loading="lazy">
                            <div class="card-img-overlay d-flex flex-column justify-content-end gradient-overlay">
                                <h3 class="text-white mb-0">{{ $work->title }}</h3>
                            </div>
                        </div>
                        
                        <div class="card-body bg-dark-soft">
                            <div class="d-flex justify-content-between align-items-start">
                                <a href="{{ route('User.works.show', [$category->slug, $work->slug]) }}" 
                                   class="btn btn-gold stretched-link">
                                    Explore Work
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-5 d-flex justify-content-center">
            {{ $works->links('pagination::bootstrap-5') }}
        </div> --}}
    </div>
</section>

@endsection

@section('css')
<style>
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
    }
    .text-shadow {
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }
    .object-fit-cover {
        object-fit: cover;
        object-position: center;
    }
    .stretched-link::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }
</style>
@endsection