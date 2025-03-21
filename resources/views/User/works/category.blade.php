@extends('layouts.user')

@section('content')
<section class="category-works py-5">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('User.works.index') }}">All Works</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="display-5 fw-bold mb-0">{{ $category->name }}</h1>
            {{-- <span class="badge bg-primary rounded-pill">{{ $works->total() }} Works</span> --}}
        </div>

        <!-- Works Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($works as $work)
                <div class="col" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow-sm hover-scale">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $work->image_path) }}" 
                                 class="card-img-top object-fit-cover" 
                                 alt="{{ $work->title }}"
                                 style="height: 250px;"
                                 loading="lazy">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h3 class="text-white mb-0 text-shadow">{{ $work->title }}</h3>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <a href="{{ route('User.works.show', [$category->slug, $work->slug]) }}" 
                                   class="btn btn-outline-primary stretched-link">
                                    Explore
                                </a>
                                {{-- <div class="text-muted small">
                                    <i class="bi bi-calendar me-1"></i>
                                    {{ $work->created_at->format('M Y') }}
                                </div> --}}
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

@section('styles')
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