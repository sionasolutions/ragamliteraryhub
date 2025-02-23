@extends('layouts.admin')

@section('title')
    Archived Blogs
@endsection

@section('content')
    @extends('layouts.admin')

    @section('content')
    
        <div class="card">
            <div class="card-datatable text-nowrap">
                <div class="table-responsive text-wrap">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($archivedBlogs->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No archived blogs found</td>
                                </tr>
                            @else
                                @foreach ($archivedBlogs as $key => $blog)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="50">
                                        </td>
                                        <td>{{ $blog->date ? \Carbon\Carbon::parse($blog->date)->format('d/m/Y') : 'N/A' }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('Admin.blog.restore', $blog->id) }}" method="POST">
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
                    {{ $archivedBlogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
