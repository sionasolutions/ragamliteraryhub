@extends('layouts.user')

@section('title', 'Home')

@section('css')
    <style>
        
    </style>
@endsection
@section('content')

    <section id="hero" class="hero min-vh-100 d-flex align-items-center dark-background">
        <div class="container">
            <div class="row align-items-center gy-5">
                <!-- Image Column -->
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="profile-frame position-relative overflow-hidden rounded-4">
                        <img src="{{ asset('/img/ragam-1.jpg') }}" class="img-fluid shadow-lg"
                            alt="Dr. Rajashekharayya G Mathapati">
                        <div class="decorative-overlay"></div>
                    </div>
                </div>

                <!-- Text Content Column -->
                <div class="col-md-6 text-white" data-aos="fade-left" data-aos-delay="300">
                    <div class="hero-content ps-lg-4">
                        <h1 class="display-4 fw-bold mb-3">Dr. Rajashekharayya G Mathapati</h1>
                        <div class="typed-container mb-4">
                            <p class="lead mb-0">Celebrated
                                <span class="typed text-warning"
                                    data-typed-items="Novelist, Poet, Playwright, Literary Scholar">
                                </span>
                            </p>
                        </div>
                        <div class="d-flex gap-3" data-aos="fade-up" data-aos-delay="400">
                            <a href="#works" class="btn btn-lg btn-warning">Explore Works</a>
                            <a href="#contact" class="btn btn-lg btn-outline-light">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="biography dark-background py-5">
        <div class="container">
            <!-- Animated Profile Header -->
            <div class="profile-header text-center" data-aos="zoom-in">
                <h1 class="gold-text mb-3" data-aos="fade-down" data-aos-delay="200">Dr. Rajashekharayya G Mathapati</h1>
                <h3 class="gold-muted" data-aos="fade-up" data-aos-delay="300">(Pen Name: <span class="gold-text">RAGAM</span>)</h3>
                <div class="badge-container mt-4" data-aos="fade-up" data-aos-delay="400">
                    <span class="badge gold-badge">Writer</span>
                    <span class="badge gold-badge">Professor</span>
                    <span class="badge gold-badge">Film Maker</span>
                </div>
            </div>
    
            <!-- Vertical Timeline Layout -->
            <div class="row g-5 mt-5">
                <!-- Animated Timeline -->
                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="500">
                    <div class="vertical-timeline">
                        <div class="timeline-line"></div>
                        
                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="600">
                            <div class="timeline-marker pulse"></div>
                            <div class="timeline-content">
                                <h4 class="gold-text">1971</h4>
                                <p class="white-text">Born in Telasanga, Belagavi District</p>
                            </div>
                        </div>
    
                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="650">
                            <div class="timeline-marker pulse"></div>
                            <div class="timeline-content">
                                <h4 class="gold-text">2005</h4>
                                <p class="white-text">Married Padmashree</p>
                            </div>
                        </div>
    
                        <!-- Add more timeline items with increasing delay -->

                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="700">
                            <div class="timeline-marker pulse"></div>
                            <div class="timeline-content">
                                <h4 class="gold-text">2011-12</h4>
                                <p class="white-text">Gandhi Smarak Nidhi Award</p>
                            </div>
                        </div>


                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="750">
                            <div class="timeline-marker pulse"></div>
                            <div class="timeline-content">
                                <h4 class="gold-text">2016</h4>
                                <p class="white-text">Shri Vijaya Prashashtie</p>
                            </div>
                        </div>

                        <div class="timeline-item" data-aos="fade-right" data-aos-delay="800">
                            <div class="timeline-marker pulse"></div>
                            <div class="timeline-content">
                                <h4 class="gold-text">2022</h4>
                                <p class="white-text">Basava Puraskar Award</p>
                            </div>
                        </div>

                    </div>
    
                    <!-- Quick Facts Card -->
                    <div class="info-card mt-4" data-aos="flip-up" data-aos-delay="700">
                        <div class="card-body">
                            <h4 class="gold-text mb-3"><i class="bi bi-stars gold-icon"></i>Quick Facts</h4>
                            <ul class="fact-list">
                                <li data-aos="fade-up" data-aos-delay="750">
                                    <i class="bi bi-translate gold-icon"></i>
                                    <span class="white-text">Kannada, English, Hindi</span>
                                </li>
                                <li class="white-text">Alma Mater: Karnatak University, Chhatrapati Shivaji University</li>
                                <li class="white-text">Board Member: Karnataka Sahitya Academy (2017-2019)</li>

                                <!-- Add more facts -->
                            </ul>
                        </div>
                    </div>
                </div>
    
                <!-- Bio Content with Tabs -->
                <div class="col-lg-8" data-aos="fade-left" data-aos-delay="550">
                    <div class="bio-tabs">
                        <!-- Tab Navigation -->
                        <nav class="tab-nav mb-4" data-aos="fade-down" data-aos-delay="600">
                            <div class="nav nav-tabs gold-border-bottom" id="nav-tab">
                                <button class="nav-link active gold-hover" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#early-life">
                                    <i class="bi bi-mortarboard me-2"></i>Early Life
                                </button>
                                <button class="nav-link gold-hover" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#career">
                                    <i class="bi bi-briefcase me-2"></i>Career
                                </button>
                                <button class="nav-link gold-hover" 
                                        data-bs-toggle="tab" 
                                        data-bs-target="#family">
                                    <i class="bi bi-people me-2"></i>Family
                                </button>
                            </div>
                        </nav>
                
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Early Life Tab -->
                            <div class="tab-pane fade show active" id="early-life">
                                <div class="bio-section" data-aos="zoom-in" data-aos-delay="700">
                                    <h4 class="gold-muted mb-4">
                                        <i class="bi bi-mortarboard gold-icon me-2"></i>
                                        Early Life & Education
                                    </h4>
                                    <div class="white-text">
                                        <p>Born in 1971 in Telasanga, Athani Taluk, Belagavi District. Completed early education in Chadachana, Vijayapura District.</p>
                                        <ul class="timeline-list gold-muted mt-3">
                                            <li data-aos="fade-right">
                                                <i class="bi bi-caret-right-fill gold-icon"></i>
                                                Undergraduate studies in Vijayapura
                                            </li>
                                            <li data-aos="fade-right" data-aos-delay="100">
                                                <i class="bi bi-caret-right-fill gold-icon"></i>
                                                Postgraduate research in Solapur
                                            </li>
                                            <li data-aos="fade-right" data-aos-delay="200">
                                                <i class="bi bi-caret-right-fill gold-icon"></i>
                                                PhD from Dharwad
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Career Tab -->
                            <div class="tab-pane fade" id="career">
                                <div class="bio-section" data-aos="zoom-in" data-aos-delay="700">
                                    <h4 class="gold-muted mb-4">
                                        <i class="bi bi-briefcase gold-icon me-2"></i>
                                        Career Journey
                                    </h4>
                                    <div class="career-path">
                                        <div class="career-step" data-aos="fade-up">
                                            <div class="step-marker"></div>
                                            <h5 class="gold-text mb-2">Research Beginning</h5>
                                            <p class="white-text">Started as Research Assistant at CIIL, Mysore</p>
                                        </div>
                                        <div class="career-step" data-aos="fade-up" data-aos-delay="100">
                                            <div class="step-marker"></div>
                                            <h5 class="gold-text mb-2">Teaching Roles</h5>
                                            <p class="white-text">Lectured in Belagavi, Hubli, Guledagudda, Bhatkal, Bagalkot, Beluru</p>
                                        </div>
                                        <div class="career-step" data-aos="fade-up" data-aos-delay="200">
                                            <div class="step-marker"></div>
                                            <h5 class="gold-text mb-2">Current Position</h5>
                                            <p class="white-text">Head of English Department at G.F.G.C. Vijayanagar, Bangalore</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Family Tab -->
                            <div class="tab-pane fade" id="family">
                                <div class="bio-section" data-aos="zoom-in" data-aos-delay="700">
                                    <h4 class="gold-muted mb-4">
                                        <i class="bi bi-people-fill gold-icon me-2"></i>
                                        Family
                                    </h4>
                                    <div class="row g-4">
                                        <div class="col-md-6" data-aos="fade-right">
                                            <div class="family-member bg-dark-soft p-4 rounded">
                                                <h5 class="gold-text mb-3">Spouse</h5>
                                                <p class="white-text mb-0">Padmashree (m. 10 November 2005)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="fade-left">
                                            <div class="family-member bg-dark-soft p-4 rounded">
                                                <h5 class="gold-text mb-3">Children</h5>
                                                <p class="white-text mb-0">Sidharth, Tarangini, and Kabir</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Animated Achievements Grid -->
            <div class="achievements-grid mt-5" data-aos="zoom-in" data-aos-delay="500">
                <h3 class="section-title gold-text text-center mb-5">Notable Achievements</h3>
                <div class="row g-4">
                    <div class="col-md-4" data-aos="flip-left" data-aos-delay="550">
                        <div class="achievement-card hover-lift">
                            <div class="card-front">
                                <i class="bi bi-trophy achievement-icon"></i>
                                <h4 class="white-text">Basava Puraskar</h4>
                            </div>
                            <div class="card-back">
                                <p class="gold-muted">2022 - Kalaburagi University</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="flip-left" data-aos-delay="600">
                        <div class="achievement-card hover-lift">
                            <div class="card-front">
                                <i class="bi bi-film achievement-icon"></i>
                                <h4 class="white-text">Film Recognition</h4>
                            </div>
                            <div class="card-back">
                                <p class="gold-muted">Dandi - 2nd Best Film (BIFF 2022)</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4" data-aos="flip-left" data-aos-delay="650">
                        <div class="achievement-card hover-lift">
                            <div class="card-front">
                                <i class="bi bi-award-fill achievement-icon"></i>
                                <h4 class="white-text">Literary Honors</h4>
                            </div>
                            <div class="card-back">
                                <p class="gold-muted">Gandhi Award (2011-12)<br>Shri Vijaya Prashashti (2016)</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more achievement cards -->
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="dark-background py-5">
        <div class="container">
            <!-- Main Title -->
            <div class="row mb-5" data-aos="fade-down">
                <div class="col-12 text-center">
                    <h2 class="display-4 gold-text mb-3">Dr. Rajashekharayya G Mathapati</h2>
                    <div class="decorative-line mx-auto"></div>
                </div>
            </div>
    
            <!-- Biography Section -->
            <div class="row g-5" data-aos="zoom-in">
                <div class="col-lg-8 mx-auto">
                    <div class="bio-card p-5 rounded-4" data-aos="fade-up">
                        <p class="lead white-text text-center mb-5">"Celebrated literary figure bridging academia and creative writing"</p>
                        <div class="white-text">
                            <p class="fs-5">Dr. Rajashekharayya G Mathapati (born 12 September 1971), popularly known by his pen name 
                                <span class="gold-text fw-bold">Ragam</span>, is an Indian poet, playwright, novelist, and critic. 
                                Born in Chadachan, Karnataka, he completed his early education in his hometown before pursuing 
                                higher studies across multiple cities.</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Timeline Section -->
            <div class="row g-5 mt-5">
                <!-- Education Timeline -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="timeline-wrapper">
                        <h3 class="gold-text mb-5 text-center">Academic Journey</h3>
                        <div class="timeline-rail">
                            <div class="timeline-progress gold-bg"></div>
                            
                            <div class="timeline-item" data-aos="fade-up">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h4 class="gold-text mb-2">Pre-Graduate</h4>
                                    <p class="white-text">Completed in Chadachan, Karnataka</p>
                                </div>
                            </div>
    
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h4 class="gold-text mb-2">Higher Education</h4>
                                    <p class="white-text">Vijayapura, Solapur, Kolhapur, and Dharwad</p>
                                    <p class="gold-muted small">Undergraduate to Ph.D. studies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Career Timeline -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="timeline-wrapper">
                        <h3 class="gold-text mb-5 text-center">Professional Journey</h3>
                        <div class="timeline-rail">
                            <div class="timeline-progress gold-bg"></div>
    
                            <div class="timeline-item" data-aos="fade-up">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h4 class="gold-text mb-2">Research Career</h4>
                                    <p class="white-text">Began at CIIL, Mysore</p>
                                </div>
                            </div>
    
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h4 class="gold-text mb-2">Teaching Roles</h4>
                                    <p class="white-text">Belagavi, Hubli, Guledagudda, Bhatkal</p>
                                </div>
                            </div>
    
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h4 class="gold-text mb-2">Current Position</h4>
                                    <p class="white-text">Head of English Department, G.F.G.C. Vijayanaga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Creative Works Section -->
            <div class="row g-5 mt-5">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="creative-card p-5 rounded-4 h-100">
                        <h3 class="gold-text mb-4">Literary Masterpieces</h3>
                        <div class="row g-4">
                            <div class="col-md-6" data-aos="zoom-in" data-aos-delay="100">
                                <div class="work-item">
                                    <i class="bi bi-book gold-icon mb-3"></i>
                                    <h4 class="white-text">"Hennu Heluva Ardha Satya"</h4>
                                    <p class="gold-muted">Groundbreaking novel exploring social truths</p>
                                </div>
                            </div>
                            <!-- Add more literary works -->
                        </div>
                        <div class="highlight-box mt-5" data-aos="fade-up">
                            <p class="white-text mb-0">Awarded Gandhi Memorial Nidhi Award (2012) for "Gandhi Anthima Dinagalu"</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="film-card p-5 rounded-4 h-100">
                        <h3 class="gold-text mb-4">Cinematic Ventures</h3>
                        <div class="film-item" data-aos="flip-up">
                            <i class="bi bi-camera-reels gold-icon mb-3"></i>
                            <h4 class="white-text">"Dandi"</h4>
                            <p class="gold-muted">2nd Prize, Bangalore International Film Festival</p>
                        </div>
                        <div class="film-item mt-4" data-aos="flip-up" data-aos-delay="100">
                            <i class="bi bi-film gold-icon mb-3"></i>
                            <h4 class="white-text">"Nassab"</h4>
                            <p class="gold-muted">Bilingual film contributions (Screenplay, Dialogues, Lyrics)</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Awards Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="gold-text text-center mb-5" data-aos="fade-down">Accolades & Honors</h3>
                    <div class="awards-grid">
                        <div class="row g-4">
                            <!-- Award Cards -->
                            <div class="col-md-6 col-lg-4" data-aos="flip-left">
                                <div class="award-card">
                                    <div class="award-icon">🏆</div>
                                    <h4 class="white-text">Srivijaya Award</h4>
                                    <div class="award-details">
                                        <p class="gold-muted mb-1">2013</p>
                                        <p class="white-text small">Kannada Sahitya Parishat</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more award cards -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Biography Section -->
   

 
    <section id="works" class="works-section dark-background py-6">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header text-center mb-6" data-aos="fade-up">
                <h2 class="section-title gradient-text mb-3">Literary Collections</h2>
                <p class="section-subtitle white-text opacity-85">Explore the diverse literary universe of Ragam</p>
            </div>
    
            <!-- Category Grid -->
            <div class="row g-5 mb-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
                @foreach ($categories as $category)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <a href="{{ route('User.works.category', $category->slug) }}" class="category-card">
                        <div class="card-inner">
                            <div class="card-bg"></div>
                            <div class="card-content">
                                <div class="icon-wrapper">
                                    <i class="bi bi-book-half"></i>
                                </div>
                                <h3 class="category-title">{{ $category->name }}</h3>
                                <div class="hover-content">
                                    <span class="explore-link">Explore Collection</span>
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
    
            <!-- CTA Section -->
            <div class="text-center mt-6" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('User.works.all-categories') }}" class="cta-btn">
                    <span>View Complete Bibliography</span>
                    <div class="cta-hover"></div>
                </a>
            </div>
        </div>
    </section>


{{--     
    @if ($blogs->count() > 0)
        <!-- Resume Section -->
        <section id="resume" class="resume section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Blogs</h2>

                <div class="blog-container">
                    @foreach ($blogs as $blog)
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="blog-content">
                                <span class="blog-date">{{ $blog->date->format('d F Y') }}</span>
                                <div class="blog-title">{{ Str::limit($blog->title, 20) }}</div>
                                <a href="{{ route('User.blog.show', $blog->slug) }}" class="blog-button rounded-1">READ
                                    MORE</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    <a href="{{ route('User.blog.blogview') }}" class="view-more">View More</a>
                </div>

            </div><!-- End Section Title -->

        </section>
        <!-- /Resume Section -->
    @endif --}}
    @if ($news->count() > 0)
        <!-- Newsletter Section -->
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

            <div class="d-flex justify-content-center">
                <a href="{{ route('User.news.show') }}" class="view-more">View More</a>
            </div>

        </section>
    @endif

    <!-- Contact Section -->

    <section id="contact" class="contact section dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 class="section-title gradient-text mb-3">Contact Us</h2>
        </div><!-- End Section Title -->
    
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
    
                <!-- Contact Info Column -->
                <div class="col-lg-5">
                    <div class="info-wrap">
                        <!-- Info Items -->
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0 gold-icon"></i>
                            <div>
                                <h3 class="gold-text">Address</h3>
                                <p class="white-text">No. 24, 2nd Main, 1st Phase, West of Chord Road, Manjunath Nagar, Rajajinagar, Bengaluru - 560010</p>
                            </div>
                        </div>
    
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0 gold-icon"></i>
                            <div>
                                <h3 class="gold-text">Call Us</h3>
                                <p class="white-text">+91 <a href="tel:9019740989" class="gold-link">9019740989</a></p>
                            </div>
                        </div>
    
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0 gold-icon"></i>
                            <div>
                                <h3 class="gold-text">Email Us</h3>
                                <p class="white-text"><a href="mailto:shreeragam71@gmail.com" class="gold-link">shreeragam71@gmail.com</a></p>
                            </div>
                        </div>
    
                        <!-- Map -->
                        <div class="map-container mt-4 rounded-3 overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4636.783131592138!2d77.54663657579805!3d12.996869687320771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d9039c84e7b%3A0xdace2112432c703!2s24%2C%202nd%20Main%20Rd%2C%201st%20Phase%2C%20Manjunath%20Nagar%2C%20Basaveshwar%20Nagar%2C%20Bengaluru%2C%20Karnataka%20560079!5e1!3m2!1sen!2sin!4v1740486480959!5m2!1sen!2sin"
                                style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
    
                <!-- Contact Form Column -->
                <div class="col-lg-7">
                    <form action="{{ route('User.email') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="gold-text mb-2">Your Name</label>
                                    <input type="text" name="name" class="form-control dark-input" required>
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="gold-text mb-2">Your Email</label>
                                    <input type="email" name="email" class="form-control dark-input" required>
                                </div>
                            </div>
                    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="gold-text mb-2">Subject</label>
                                    <input type="text" name="subject" class="form-control dark-input" required>
                                </div>
                            </div>
                    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="gold-text mb-2">Message</label>
                                    <textarea name="message" rows="6" class="form-control dark-input" required></textarea>
                                </div>
                            </div>
                    
                            <div class="col-md-12 text-center">
                                <!-- Message Container -->
                                <div class="message-container position-relative" style="min-height: 50px;">
                                    <div class="loading message-box">
                                        <span>Sending...</span>
                                        <button class="close-btn">&times;</button>
                                    </div>
                                    
                                    <div class="error-message message-box">
                                        <span></span>
                                        <button class="close-btn">&times;</button>
                                    </div>
                                    
                                    <div class="sent-message message-box">
                                        <span>Your message has been sent. Thank you!</span>
                                        <button class="close-btn">&times;</button>
                                    </div>
                                </div>
                    
                                <button type="submit" class="btn-gold mt-3">
                                    Send Message
                                    <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        new Swiper('.categories-slider', {
            slidesPerView: 2,
            spaceBetween: 15,
            loop: {{ $categories->count() > 3 ? 'true' : 'false' }},
            autoplay: {
                delay: 3000,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 25
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
    // Close button functionality
    document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.target.closest('.message-box').style.display = 'none';
        });
    });

    // Form submission handling
    const forms = document.querySelectorAll('.php-email-form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            showMessage('loading');
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    showMessage('sent-message', data.message);
                    form.reset();
                } else {
                    showMessage('error-message', data.message);
                }
            })
            .catch(error => {
                showMessage('error-message', 'An error occurred. Please try again.');
            });
        });
    });

    function showMessage(type, message = '') {
        const container = document.querySelector('.message-container');
        const messageBox = container.querySelector(`.${type}`);
        
        // Hide all messages
        container.querySelectorAll('.message-box').forEach(box => {
            box.style.display = 'none';
        });
        
        // Set message content if provided
        if(message) {
            messageBox.querySelector('span').textContent = message;
        }
        
        // Show the requested message
        messageBox.style.display = 'flex';
        
        // Auto-hide success messages after 5 seconds
        if(type === 'sent-message') {
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 5000);
        }
    }
});
    </script>
@endsection
