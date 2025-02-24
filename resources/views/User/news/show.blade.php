@extends('layouts.user')

@section('title', 'news')

@section('content')
    <section id="newsletter" class="resume section">
        <div class="container section-title" data-aos="fade-up">
            <h2>News Mentions</h2>
        </div>
        <div class="newsletter-container justify-content-center">

            @foreach ($news as $new)
                <div class="newsletter-item">
                    <div class="newsletter-img">
                        <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}">
                    </div>
                    <div class="newsletter-content">
                        <div class="newsletter-title">{{ $new->title }}</div>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
@endsection
