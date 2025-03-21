@extends('layouts.user')

@section('content')
<section class="works-index py-5">
    <div class="container">
        <h1 class="mb-5 text-center">Literary Works</h1>

        @foreach($categories as $category)
            <div class="category-section mb-5">
                <h2 class="category-title mb-4">
                    <a href="{{ route('User.works.category', $category->slug) }}" class="text-decoration-none">
                        {{ $category->name }}
                    </a>
                </h2>

                <div class="swiper works-slider">
                    <div class="swiper-wrapper">
                        @foreach($category->works as $work)
                            <div class="swiper-slide">
                                <div class="work-card">
                                    <a href="{{ route('User.works.show', [$category->slug, $work->slug]) }}">
                                        @if($work->image_path)
                                            <img src="{{ asset('storage/' . $work->image_path) }}" 
                                                 alt="{{ $work->title }}" 
                                                 class="img-fluid">
                                        @endif
                                        <h3 class="work-title mt-3">{{ $work->title }}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@section('styles')
<style>
    .works-slider {
        padding: 0 40px;
    }
    .work-card {
        padding: 15px;
        transition: transform 0.3s ease;
    }
    .work-card:hover {
        transform: translateY(-5px);
    }
    .work-title {
        font-size: 1.1rem;
        font-weight: 500;
    }
</style>
@endsection

@section('js')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    document.querySelectorAll('.works-slider').forEach(slider => {
        new Swiper(slider, {
            slidesPerView: 2,
            spaceBetween: 15,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                576: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                992: { slidesPerView: 5 }
            }
        });
    });
</script>
@endsection