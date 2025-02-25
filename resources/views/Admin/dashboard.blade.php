@extends('layouts.admin')


@section('content')
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-3 mb-6">
                <div class="card h-100">
                    <div class="card-body d-flex gap-4 align-items-center text-center">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar-m flex-shrink-1">
                                <i class="menu-icon tf-icons bx bxl-blogger" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-3">{{$blogs}}</h4>
                            <p class="mb-1">Blogs</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3 mb-6">
                <div class="card h-100">
                    <div class="card-body d-flex gap-4 align-items-center text-center">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar-m flex-shrink-1">
                                <i class="menu-icon tf-icons bx bx-news" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-3">{{$news}}</h4>
                            <p class="mb-1">News</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3 mb-6">
                <div class="card h-100">
                    <div class="card-body d-flex gap-4 align-items-center text-center">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar-m flex-shrink-1">
                                <i class="menu-icon tf-icons bx bx-book" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-3">{{$media}}</h4>
                            <p class="mb-1">Media</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3 mb-6">
                <div class="card h-100">
                    <div class="card-body d-flex gap-4 align-items-center text-center">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <div class="avatar-m flex-shrink-1">
                                <i class="menu-icon tf-icons bx bx-book" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="card-title mb-3">{{$books}}</h4>
                            <p class="mb-1">Books</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@if(session('success'))
    document.addEventListener("DOMContentLoaded", function() {
        toastr.success("{{ session('success') }}");
    });
@endif

@endsection