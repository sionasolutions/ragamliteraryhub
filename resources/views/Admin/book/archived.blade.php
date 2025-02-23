@extends('layouts.admin')

@section('title')
    Archived Books
@endsection

@section('content')

    <div class="card">
        <div class="card-datatable text-nowrap">
            <div class="table-responsive text-wrap">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Cover</th>
                            <th>Publication Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($archivedBooks->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">No archived books found</td>
                            </tr>
                        @else
                            @foreach ($archivedBooks as $key => $book)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Book Cover" width="50">
                                    </td>
                                    <td>{{ $book->publication_date ? \Carbon\Carbon::parse($book->publication_date)->format('d/m/Y') : 'N/A' }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('Admin.book.restore', $book->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning" title="Restore">
                                                <i class="bx bx-refresh"></i> Restore
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $archivedBooks->links() }}
            </div>
        </div>
    </div>

@endsection
