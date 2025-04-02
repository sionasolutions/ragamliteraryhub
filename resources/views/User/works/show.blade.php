@extends('layouts.user')

@section('content')
<section class="work-detail dark-background py-5">
    <div class="container">
        <!-- Back Navigation -->
        <nav class="mb-5" data-aos="fade-down">
            <a href="{{ route('User.works.category', $category->slug) }}" class="back-link gold-link">
                <i class="bi bi-arrow-left-short"></i>
                <span>Back to {{ $category->name }}</span>
            </a>
        </nav>

        <!-- Main Content -->
        <div class="row g-5">
            <!-- Image Section -->
            <div class="col-lg-8" data-aos="fade-right">
                <div class="artwork-frame border-gold rounded-4 overflow-hidden">
                    <div class="artwork-inner">
                        <img src="{{ asset('storage/' . $work->image_path) }}" 
                             alt="{{ $work->title }}" 
                             class="artwork-image"
                             loading="lazy">
                        <div class="gradient-overlay"></div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="150">
                <div class="work-meta">
                    <div class="mb-5">
                        <h1 class="display-4 gold-text fw-bold mb-4">{{ $work->title }}</h1>
                        <div class="d-flex align-items-center gap-4">
                            <div class="category-badge">
                                {{ $category->name }}
                            </div>
                            <div class="publish-date gold-muted">
                                <i class="bi bi-calendar me-2"></i>
                                {{ $work->created_at->format('M Y') }}
                            </div>
                        </div>
                    </div>

                    <article class="work-description white-text text-justify">
                        {!! $work->description !!}
                    </article>
                </div>
            </div>
        </div>

        <!-- Related Works -->
        @if($relatedWorks->count() > 0)
        <div class="mt-5 pt-5" data-aos="fade-up">
            <h3 class="gold-text h2 mb-5">More from {{ $category->name }}</h3>
            <div class="row g-4">
                @foreach($relatedWorks as $related)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <a href="{{ route('User.works.show', [$category->slug, $related->slug]) }}" 
                       class="related-work-card">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $related->image_path) }}" 
                                 alt="{{ $related->title }}"
                                 loading="lazy">
                            <div class="hover-content">
                                <span class="view-button">View Work</span>
                            </div>
                        </div>
                        <div class="work-meta">
                            <h5 class="gold-text">{{ $related->title }}</h5>
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
   .work-detail {
    background: var(--dark-bg);
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--gold);
    text-decoration: none;
    transition: opacity 0.3s ease;
}

.back-link:hover {
    opacity: 0.8;
}

.artwork-frame {
    border: 2px solid rgba(255, 215, 0, 0.1);
    border-radius: 1rem;
    overflow: hidden;
    transition: border-color 0.3s ease;
}

.artwork-image {
    width: 100%;
    height: 600px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.artwork-frame:hover .artwork-image {
    transform: scale(1.02);
}

.gradient-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 50%;
    background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.7) 100%);
}

.category-badge {
    background: rgba(255, 215, 0, 0.1);
    color: var(--gold);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
}

.publish-date {
    color: rgba(255, 215, 0, 0.8);
}

.work-description {
    line-height: 1.8;
    font-size: 1.1rem;
}

.related-work-card {
    text-decoration: none;
    display: block;
}

.image-container {
    position: relative;
    border-radius: 1rem;
    overflow: hidden;
    margin-bottom: 1rem;
}

.image-container img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.hover-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.view-button {
    color: var(--gold);
    border: 2px solid var(--gold);
    padding: 0.5rem 1.5rem;
    border-radius: 50px;
}

.related-work-card:hover .hover-content {
    opacity: 1;
}

@media (max-width: 768px) {
    .artwork-image {
        height: 400px;
    }
    
    .display-4 {
        font-size: 2rem;
    }
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