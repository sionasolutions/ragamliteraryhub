@extends('layouts.user')

@section('content')
<section class="all-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-5">All Categories</h2>
            </div>
        </div>

        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="{{ route('User.works.category', $category->slug) }}" class="category-link">
                        <div class="category-box bg-light p-4 rounded text-center">
                            <h4>{{ $category->name }}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
