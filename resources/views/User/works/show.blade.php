@extends('layouts.user')

@section('content')
<section class="work-detail py-5">
    <div class="container">
        <!-- Back Navigation -->
        <nav class="mb-4" data-aos="fade-down">
            <a href="{{ route('User.works.category', $category->slug) }}" class="btn btn-link text-decoration-none">
                ← Back to {{ $category->name }}
            </a>
        </nav>

        <!-- Main Content -->
        <div class="row g-5">
            <!-- Image Section -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="ratio ratio-4x3">
                        <img src="{{ asset('storage/' . $work->image_path) }}" 
                             alt="{{ $work->title }}" 
                             class="object-fit-cover"
                             loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                <div class="d-flex flex-column h-100">
                    <div class="mb-4">
                        <h1 class="display-5 fw-bold mb-3">{{ $work->title }}</h1>
                        <div class="d-flex align-items-center gap-3 text-muted">
                            <div class="badge bg-primary rounded-pill px-3 py-2">
                                {{ $category->name }}
                            </div>
                            <div class="text-muted">
                                <i class="bi bi-calendar me-1"></i>
                                {{ $work->created_at->format('M Y') }}
                            </div>
                        </div>
                    </div>

                    <article class="prose flex-grow-1 text-justify">
                        {!! $work->description !!}
                    </article>
                </div>
            </div>
        </div>

        <!-- Related Works -->
        @if($relatedWorks->count() > 0)
        <div class="mt-5 pt-5" data-aos="fade-up">
            <h3 class="h4 mb-4">More in {{ $category->name }}</h3>
            <div class="row g-4">
                @foreach($relatedWorks as $related)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <a href="{{ route('User.works.show', [$category->slug, $related->slug]) }}" 
                       class="card h-100 border-0 shadow-hover text-decoration-none">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('storage/' . $related->image_path) }}" 
                                 alt="{{ $related->title }}"
                                 class="object-fit-cover"
                                 loading="lazy">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ $related->title }}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@section('css')
<style>
    .prose {
        line-height: 1.7;
        font-size: 1.1rem;
        color: #444;
    }
    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
    }
    .ratio-4x3 {
        --bs-aspect-ratio: 100%;
    }
    .object-fit-cover {
        object-fit: contain;
        object-position: center;
    }
    .shadow-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.08);
    }
    .shadow-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.12);
    }
</style>
@endsection

@section('js')

<script>
    AOS.init({
        duration: 600,
        once: true,
        offset: 100
    });
</script>
@endsection