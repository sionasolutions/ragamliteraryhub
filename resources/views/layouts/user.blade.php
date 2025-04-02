<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>RAGAM</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @yield('meta')
    <!-- Favicons -->
    {{-- <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}"> --}}

    <!-- Preload Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@300;500;700&family=Raleway:wght@400;600;800&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" media="print"
        onload="this.media='all'">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @yield('css')

</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <!-- Mobile nav menu -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
                <li><a href="{{ url('/') }}#about"><i class="bi bi-person navicon"></i> About</a></li>
                {{-- <li><a href="{{ url('/') }}#resume"><i class="bi bi-file-earmark-text navicon"></i> Blogs</a></li>
                <li><a href="{{ url('/') }}#newsletter"><i class="bi bi-file-earmark-text navicon"></i> NewsLetter</a></li> --}}
                <li><a href="{{ url('/') }}#works"><i class="bi bi-file-earmark-text navicon"></i>Works</a></li>
                {{-- <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Gallery</a></li>
                <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Achievements</a></li> --}}

                <li><a href="{{ url('/') }}#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
            </ul>
        </nav>

    </header>
    <main class="main">

        @yield('content')
    </main>

    <footer id="footer" class="footer position-relative dark-background py-4">
    <div class="container">
        <div class="credits text-center white-text">
            © Developed with <span class="gold-heart">❤️</span> by
            <a href="https://sionasolutions.com/" target="_blank" class="gold-link footer-link">
                Siona Solutions
            </a>
        </div>
    </div>
</footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}" defer></script>
    <script src="{{ asset('vendor/aos/aos.js') }}" defer></script>
    <script src="{{ asset('vendor/typed.js/typed.umd.js') }}" defer></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}" defer></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}" defer></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}" defer></script>

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <script>
        let lastScrollTop = 0;
        const header = document.getElementById("header");
        const mobileNavToggle = document.querySelector('.header-toggle');

        // Scroll behavior: hide header on scroll down, show on scroll up
        window.addEventListener("scroll", function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            // If scrolling down
            if (currentScroll > lastScrollTop) {
                // Hide header when scrolling down
                header.classList.add("hidden");
            } else {
                // Show header when scrolling up
                header.classList.remove("hidden");
            }

            // Update last scroll position
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative scroll
        });

        // Mobile navigation toggle
        mobileNavToggle.addEventListener('click', () => {
            header.classList.toggle('show-nav');
        });

        // Handle dropdown toggle
        const dropdownLinks = document.querySelectorAll('.navmenu .dropdown > a');
        dropdownLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default anchor behavior
                const parentDropdown = link.parentElement;
                parentDropdown.classList.toggle('active'); // Toggle dropdown visibility
            });
        });
    </script>
</body>

</html>
