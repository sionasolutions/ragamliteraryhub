@extends('layouts.user')

@section('title', 'books')

@section('content')
<div class="books-poem-container">
    @foreach($books as $book)
    <div class="books-poem-item">
        <div class="books-poem-img">
            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
        </div>
        <div class="books-poem-content">
            <div class="books-poem-title">{{ $book->title }}</div>
            {{-- <a href="{{ route('User.book.show', $book->slug) }}" class="buy-button">BUY NOW</a> --}}
            <a href="#" class="buy-button">BUY NOW</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
