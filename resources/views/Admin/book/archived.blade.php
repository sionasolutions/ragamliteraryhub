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
                            <th>Thumbnail</th>
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
                                    <td>
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Cover" width="50">
                                    </td>
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
