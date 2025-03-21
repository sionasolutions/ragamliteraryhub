<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href={{ asset('img/favicon/favicon.ico') }} />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href={{ asset('vendor/fonts/boxicons.css') }} />

    <!-- Core CSS -->
    <link rel="stylesheet" href={{ asset('vendor/css/core.css') }} class="template-customizer-core-css" />
    <link rel="stylesheet" href={{ asset('vendor/css/theme-default.css') }} class="template-customizer-theme-css" />
    <link rel="stylesheet" href={{ asset('css/demo.css') }} />
    <!-- Toastr CSS -->
    <link href="{{ asset('vendor/flasher/jquery.min.js') }}" rel="stylesheet">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href={{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }} />
    <!-- Toastr JS -->
    @yield('tiny-mce')

    <!-- Page CSS -->
    <style>
        .permanent-marker-regular {
            font-family: "Permanent Marker", serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    <!-- Helpers -->
    <script src={{ asset('vendor/js/helpers.js') }}></script>

    <script src={{ asset('js/config.js') }}></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo justify-content-center align-items-center">
                    <h1 class="permanent-marker-regular">RAGAM</h1>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->routeIs('Admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('Admin.dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- /Dashboard -->
                    <!-- Blog -->
                    <li class="menu-item {{ request()->routeIs('Admin.blog.index') ? 'active' : '' }}">
                        <a href="{{ route('Admin.blog.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxl-blogger"></i>
                            <div data-i18n="Analytics">Blog</div>
                        </a>
                    </li>
                    <!-- /Blog -->
                    <!--Book-->
                    <li class="menu-item {{ request()->routeIs('Admin.book.index') ? 'active' : '' }}">
                        <a href="{{ route('Admin.book.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div data-i18n="Analytics">Book</div>
                        </a>
                    </li>
                    <!--/Book-->
                    <!--News-->
                    <li class="menu-item {{ request()->routeIs('Admin.news.index') ? 'active' : '' }}">
                        <a href="{{ route('Admin.news.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-news"></i>
                            <div data-i18n="Analytics">News</div>
                        </a>
                    </li>
                    <!--/News-->
                    <!--Media-->
                    <li class="menu-item {{ request()->routeIs('Admin.media.index') ? 'active' : '' }}">
                        <a href="{{ route('Admin.media.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-image"></i>
                            <div data-i18n="Analytics">Media</div>
                        </a>
                    </li>
                    <!--/Media-->
                    
                    
                    <li class="menu-item ">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-briefcase"></i>
                            <div data-i18n="Works">Works</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->routeIs('Admin.categories.index') ? 'active' : '' }}">
                                <a href="{{ route('Admin.categories.index') }}" class="menu-link">
                                    <div data-i18n="Categories">Categories</div>
                                </a>
                            </li>
                            <li class="menu-item ">
                                <a href="{{ route('Admin.works.index') }}" class="menu-link">
                                    <div data-i18n="Works">Works</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center gap-2 ms-auto">
                            <li>Admin</li>
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src={{ asset('img/avatars/1.png') }} alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->

                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <nav aria-label="breadcrumb" class="m-2">
                            <ol class="breadcrumb">
                                @if (request()->routeIs('Admin.dashboard'))
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Dashboard</a>
                                    </li>
                                @endif
                                @if (request()->routeIs('Admin.blog'))
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.blog.index') }}">Blogs</a>
                                    </li>
                                    @if (request()->routeIs('Admin.blog.create'))
                                        <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
                                    @elseif(request()->routeIs('Admin.blog.edit'))
                                        <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                                    @elseif(request()->routeIs('Admin.blog.archived'))
                                        <li class="breadcrumb-item active" aria-current="page">Archived Blog</li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                                    @endif
                                @endif
                                @if (request()->routeIs('Admin.book'))
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.book.index') }}">Books</a>
                                    </li>
                                    @if (request()->routeIs('Admin.book.create'))
                                        <li class="breadcrumb-item active" aria-current="page">Create Book</li>
                                    @elseif(request()->routeIs('Admin.book.edit'))
                                        <li class="breadcrumb-item active" aria-current="page">Edit Book</li>
                                    @elseif(request()->routeIs('Admin.book.archived'))
                                        <li class="breadcrumb-item active" aria-current="page">Archived Book</li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">Book List</li>
                                    @endif
                                @endif
                                @if (request()->routeIs('Admin.news'))
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.news.index') }}">News</a>
                                    </li>
                                    @if (request()->routeIs('Admin.news.create'))
                                        <li class="breadcrumb-item active" aria-current="page">Create News</li>
                                    @elseif(request()->routeIs('Admin.news.edit'))
                                        <li class="breadcrumb-item active" aria-current="page">Edit News</li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">News List</li>
                                    @endif
                                @endif
                                @if (request()->routeIs('Admin.media'))
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.media.index') }}">Media</a>
                                    </li>
                                    @if (request()->routeIs('Admin.media.create'))
                                        <li class="breadcrumb-item active" aria-current="page">Create Media</li>
                                    @elseif(request()->routeIs('Admin.media.edit'))
                                        <li class="breadcrumb-item active" aria-current="page">Edit Media</li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">Media List</li>
                                    @endif
                                @endif
                            </ol>
                        </nav>
                        @if (session('alertMessage'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        title: 'Alert',
                                        text: "{{ session('alertMessage') }}",
                                        icon: 'info',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            </script>
                        @endif


                        @yield('content')
                        <!-- / Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl d-flex justify-content-center py-2 flex-md-row">
                                <div class="mb-2 mb-md-0">
                                    © Developed with ❤️ by
                                    <a href="https://sionasolutions.com/" target="_blank"
                                        class="footer-link fw-bolder">Siona
                                        Solutions</a>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>


                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        @yield('js')


        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src={{ asset('vendor/libs/jquery/jquery.js') }}></script>
        <script src={{ asset('vendor/libs/popper/popper.js') }}></script>
        <script src={{ asset('vendor/js/bootstrap.js') }}></script>
        <script src={{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}></script>
        

        <script src={{ asset('vendor/js/menu.js') }}></script>
        <!-- endbuild -->
        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src={{ asset('js/admin-main.js') }}></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>

</html>
