@extends('layouts.user')

@section('title', 'Home')

@section('css')
    <style>
        .loading {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('/img/IMG-20241221-WA0131.jpg') }}" alt="" style="width: 100%; height: auto;"
            data-aos="fade-in">


        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2> Dr. Rajashekharayya G Mathapati </h2>
            <p>I'm a <span class="typed" data-typed-items="novelist, poet,  playwright">novelist</span><span
                    class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span
                    class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
        </div>

    </section><!-- /Hero Section -->
    <!-- Section Title -->
    <div class="container section-title about-justify p-2 my-2" id="about" data-aos="fade-up">
        <h2>About</h2>
        <p> Dr. Rajashekharayya G Mathapati (12 September 1971) popularly
            known by his pen name Ragam ,was an Indian poet, playwright, novelist and critic. Ragam spent his early
            childhood and completed his pre-graduate education in Chadachan, the last town in Karnataka. He pursued further
            education, from his undergraduate studies to his Ph.D., in various locations including Vijayapura, Solapur,
            Kolhapur, and Dharwad. He initially worked as a Research Assistant at CIIL in Mysore before taking on lecturing
            roles in Belagavi, Hubli, Guledagudda, Bhatkal, Bagalkot, and Beluru. Currently, he heads the Department of
            English at G.F.G.C. Vijayanaga in Bangalore. Ragam is also involved in literary composition and film direction.
            His notable works in Kannada include "Hennu Heluva Ardha Satya," "Osho Emba Vidrohiya Kathe," "Anada," "Baduka
            Barade Baduku," "Gallu Gadiparu," "Kurban," and "Shir Saamanyarigagi Sahitya," all of which have been well
            received. In 2012, he was awarded the Gandhi Memorial Nidhi Award from Gandhi Bhavan in Bangalore for his work
            "Gandhi Anthima Dinagalu." </p>
        <br>
        <p>The Kannada Sahitya Parishat in Bengaluru honored him with the "Srivijaya Award" in 2013 for his overall literary
            contributions. His novel "Jadamaliya Jiva Keluvadilla" received the Pustaka Sogasu Prize in 2018 from the
            Kannada Pustaka Pradhikara, and his work "Jagadvandya Bharatam" was recognized as the best novel of 2019 with
            the Kuvempu Memorial Award by the Kannada Sangha of Shimogge. Additionally, "John Keats" earned him the Basava
            Puraskara in 2022 from Kalaburagi University. He has also been a member of the Karnataka Sahitya Akademi.
            The film "Dandi," based on Ragam's novel, won second prize at the Bangalore International Film Festival. He
            contributed to the screenwriting, dialogues, and song lyrics for the film "Nassab," which was produced
            simultaneously in both Hindi and Kannada.
        </p>
    </div><!-- End Section Title -->
    <div class="container about" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">

            <div class="col-lg-12 content">
                <h2 class="mb-4">Dr. Rajashekharayya G Mathapati (RAGAM)</h2>
                <div class="container">
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-lg-12 col-md-12 mb-4">
                            <ul class="info-list ">
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Born:</strong>
                                    <span>Telasanga, Athani Taluk, Belagavi Dist. 12 September 1971, Chadachana, Vijayapura
                                        Dist. Currently in Bangalore (now in Karnataka)</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Awards:</strong>
                                    <span class="text-start">Basava Puraskar (2022), Karnataka State Gandhi Smarak Nidhi
                                        Award (2011-12), Shri Vijaya Prashashti (Kannada Sahitya Parishat, 2016)</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Film Recognition:</strong>
                                    <span class="text-start">Dandi Novel-based film, 2nd Best Kannada Cinema at Bengaluru
                                        International Film Festival (BIFF), 2022</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Pen Name:</strong>
                                    <span class="text-start">Ragam</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Occupation:</strong>
                                    <span class="text-start">Writer, Professor, Film Maker</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Languages:</strong>
                                    <span class="text-start">Kannada, English, Hindi</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Board Member:</strong>
                                    <span class="text-start">Ex-member, Karnataka Sahitya Academy, Bengaluru
                                        (2017-2019)</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Almamater:</strong>
                                    <span class="text-start">Karnatak University, Dharwad; Chhatrapati Shivaji University,
                                        Maharashtra</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Spouse:</strong>
                                    <span class="text-start">Padmashree</span>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <strong>Children:</strong>
                                    <span class="text-start">Sidharth, Tarangini, and Kabir</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Second Column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5 Biography">
        <!-- Biography Title -->
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-4 ">Biography</h2>
            </div>
        </div>
        <!-- Early Life, Education, and Career Sections with 3 Cards -->
        <div class="row mb-4 mx-1">
            <!-- Early Life Card -->
            <div class="col-md-4 mb-3">
                <div class="card border-0  h-100" style="box-shadow: 0 10px 15px rgba(20, 157, 221, 0.3);">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: bold;">Early Life and Education</h4>
                        <p class="card-text">
                            Ragam was born in 1971 in Telasanga, Athani Taluk, Belagavi District. He spent his early
                            education in Chadachana, the last town in Karnataka. He pursued further education from his
                            undergraduate studies to his PhD in various locations including Vijayapura, Solapur, Kollapur,
                            and Dharwad.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Family Card -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 h-100" style="box-shadow: 0 10px 15px rgba(20, 157, 221, 0.3);">
                    <div class="card-body">
                        <h4 class="card-title " style="font-weight: bold;">Family</h4>
                        <p class="card-text">
                            Ragam married Padmashree on 10 November 2005. He has two sons, Sidharth and Kabir, and one
                            daughter, Tharangini.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Career Card -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 h-100" style="box-shadow: 0 10px 15px rgba(20, 157, 221, 0.3);">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: bold;">Career</h4>
                        <p class="card-text">
                            Ragam started his career as a research assistant at CIIL in Mysore before taking on lecturing
                            roles in Belagavi, Hubli, Guledagudda, Bhatkal, Bagalkot, and Beluru. Currently, he heads the
                            Department of English at G.F.G.C., Vijayanagar in Bangalore. Ragam is also involved in literary
                            composition and film direction.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="container Bibliography section">
        <div class="row">
            <div class="col-12">
                <h2 class="text-start  my-4">Works and Achievements of RAGAM </h2> <!-- Bibliography Heading with margin -->
            </div>
        </div>
        <div class="row mx-1"> <!-- Row with horizontal margin -->

            <!-- First Column for Poetry, Novels -->
            <div class="col-lg-6 ">
                <div class="Bibliography-item  mx-2">
                    <h4>Poetry</h4>
                    <ul>
                        <li>Arpane</li>
                        <li>Yaradu Dadagala Naduve</li>
                        <li>Ondistu Karune, Mattastu Neeru</li>
                        <li>Nishagaana (Kannada & English)</li>
                        <li>Iruvashtu Kaala Iruvashtee Kaala</li>
                        <li>Kilu Gombeya Katara</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Novels</h4>
                    <ul>
                        <li>Jagadvandya Bharatam (Kannada, English & Telugu)</li>
                        <li>Dandi (Kannada & English)</li>
                    </ul>
                </div>
                <div class="Bibliography-item mx-2">
                    <h4>Stories</h4>
                    <ul>
                        <li>Alalu</li>
                        <li>Hennu Heluva ArdhaSatya: E Saakiyar Kai Soki</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Plays</h4>
                    <ul>
                        <li>Gandhi Mattu Goonda (2002)</li>
                        <li>Amaratvakke Ahvana (2008)</li>
                        <li>Gandhi Antima Dinagalu</li>
                    </ul>
                </div>
                <div class="Bibliography-item mx-2">
                    <h4>Translations Published</h4>
                    <ul>
                        <li>Lajavanti (2007)</li>
                        <li>Sparsha (2007)</li>
                        <li>Vidaya (2007)</li>
                        <li>Ondu Dinada Raja (2007)</li>
                        <li>Amaratvakke Ahvana (2008)</li>
                        <li>Jagatprasiddha Bhasanagalu (2010)</li>
                        <li>Lokavikhyatar Nudimuttugalu (2010)</li>
                        <li>Visva Srestha Mahileyara Bhasanagalu (2010)</li>
                        <li>Jagattin Ayda Mahatmar Bhashanagalu (2010)</li>
                        <li>Prapanchad Shresta Tatvajnanigal Bhashanagalu (2011)</li>
                        <li>Mahan Yodhara Mahan Bhashanagalu (2011)</li>
                        <li>Vishwamanya Sahitigal Bashanagalu (2011)</li>
                        <li>Nobel Prashasti Vijetar Bashanagalu (2011)</li>
                        <li>Vishwavikhyata Rajakaranigal Bhashanagalu (2011)</li>
                        <li>Baduku Badalisuva Matugalu (2012)</li>
                        <li>Gandhi Sutra (2012)</li>
                        <li>Bhagna Preemi (2012)</li>
                        <li>Jaadamaaliy Jiva Keluvudilla (2018)</li>
                        <li>Nepali Poems (2019)</li>
                    </ul>
                </div>
                <div class="Bibliography-item mx-2">
                    <h4>Felicitations and Awards</h4>
                    <ul>
                        <li>Felicitation by Neha Samskruti Form, Koppala, 2008</li>
                        <li>Poura Sanmana by Municipal Councile, Beluru for Literary achievements, 2009</li>
                        <li>Felicitation by Vishwa Rural Development Trust, Belur, 2010</li>
                        <li>Felicitation by Taluq Kannada Sahitya Sammelan, Arehalli, 2011</li>
                        <li>Felicitation by Velapuri Sahitya and Samskruti Form, Belur, 2012</li>
                        <li>Karnataka State Gandhi Smarak Nidhi Award for ‘Gandhi Antim Dingalu’ 2011-12</li>
                        <li>D.S.Karki Award for ‘Gandhi Mugiyad Adhyay’, Kannada and Culture Dept, Belgaum 2015</li>
                        <li>Renuk Basava Bhushan Prashashti, Kocheri 2015</li>
                        <li>Budha Shanti Prashashti, Vishva Chetan Trust, Bangalore 2015</li>
                        <li>Shri Vijaya Prashashti, Kannada Sahitya Parishat, Bangalore 2016</li>
                        <li>Sa. Ja. Nagalotimath Sahitya Ratna Prashashti (For Gandhi Book) 2016</li>
                        <li>Adviser Sahitya Prashashti, (For Gandhi Book) Mandya – 2017</li>
                        <li>Kannada Seva Ratna Prashashti, Kannada Sahitya Parishat, Bangalore-2018</li>
                        <li>Sangama Siri Sahitya Prashashti, Aminagad-2018</li>
                        <li>President, 10th undivided Indi Taluka Kannada Sahitya Sammelana at Chadachan on 26th July, 2018
                        </li>
                        <li>Chief Person Presidential Talk, 16th Vijayapura District Kannada Sahitya Sammelana at Talikote
                            on 28th and 29th, 2019</li>
                        <li>Chetan Sahitya Puraskar for ‘Jaadamaliya Jeeva Keluvudill’, Dharwad-2019</li>
                        <li>‘2018 Pustak Sogasu and Mudran Sogasu’ award for ‘Jaadamaliya Jeeva Keluvudill’ Kannada Pustak
                            Pradhikar, Bengaluru – 2019</li>
                        <li>‘2019 Kuvempu Best Novel Award’ for ‘Jagadvandya Bharatam’ Karnataka Sangha, Shivamogga, 20th
                            June, 2020</li>
                        <li>‘2020-21 Ajoor Pratishtan Award’ for ‘Badukabarade Baduku’ Harugeri, 08th February, 2021</li>
                        <li>Felicitation by Sangam Pratishtana, Hunagund and Sahitya Balaga for 50th Birthday on 11th Sept
                            2021</li>
                        <li>Felicitation by Beladingala Kavya Vedike, Guledagudd for 50th Birthday on 12th Sept 2021</li>
                        <li>Teacher’s Day Felicitation by Lions Club of Bengaluru Kings on 15th Sept 2021</li>
                        <li>‘Dandi’ Novel based film, stood as 2nd Best Kannada Cinema in Bengaluru International Film
                            Festival (BIFF), 3 – 10 March 2022</li>
                        <li>‘Basava Puraskar’ State level award for ‘Badukabaarade Baduku’ (Life & Letters of Keats) book by
                            Janakalyana Trust, Kalaburgi on 08th May 2022</li>
                    </ul>
                </div>


            </div>

            <!-- Second Column for Stories, Plays -->
            <div class="col-lg-6">
                <div class="Bibliography-item mx-2">
                    <h4>Autobiography</h4>
                    <ul>
                        <li>Hatayogi (1996)</li>
                        <li>Osho: Na Bhooto Na Bhavishyti (2006)</li>
                        <li>Fhakeerana Filmy Duniya (2009)</li>
                        <li>Osho, Ondu Kiranada Payana (2009)</li>
                        <li>G B Joshi, Shatamana Kanda Sahiti (2010)</li>
                        <li>Osho Yamba Vidrohiya Kate (2011)</li>
                        <li>Paradesiya Filmy Payana (2011)</li>
                        <li>Gandhi: Antima Dinagalu (2012)</li>
                        <li>K.A. Abbas (2012)</li>
                        <li>Gandhi Mugiyad Adhyay (2013)</li>
                        <li>Battalege Beragaagabaradu (2015)</li>
                        <li>Gandhi (2015)</li>
                        <li>John Keats: Neer Mele Nenap Baredu (2017)</li>
                        <li>Digambarave Divyambar (2017)</li>
                    </ul>
                </div>
                <div class="Bibliography-item mx-2">
                    <h4>Literary Criticism</h4>
                    <ul>
                        <li>Avalokana (1997)</li>
                        <li>Lingadevaru Halemaneyawara Antembera Ganda (2002)</li>
                        <li>Prachalita Kannada Kavya (2004)</li>
                        <li>Shabdha Sutakadind (2010)</li>
                        <li>Besharat (2010)</li>
                        <li>Vibandha (2010)</li>
                        <li>Kannadakkondu Kannadi (2011)</li>
                        <li>Bahishkrut Belakinalli (2013)</li>
                        <li>Huva Tandavaru (2016)</li>
                        <li>Shri Saamanyarigaagi Sahitya (2020)</li>
                        <li>Kadalayitu Kannada (2021)</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Columns Writing</h4>
                    <ul>
                        <li>Nannolagina Nanu (2007)</li>
                        <li>Kavyakke Urulu Part-1 (2014)</li>
                        <li>Kavyakke Urulu Part-2 (2015)</li>
                        <li>Kavyakke Urulu Part-3 (2015)</li>
                        <li>Preeti Nalavattu Reeti (2015)</li>
                        <li>Kavyakke Urulu Part-4 (2016)</li>
                        <li>Mahile Emba Murakshar (2016)</li>
                        <li>Kurban (2016)</li>
                        <li>Rakta Mattu Rajakaran (2017)</li>
                        <li>Gallu Gadiparu (2017)</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Editorial On Ragam Sahitya</h4>
                    <ul>
                        <li>Barahvemba Nitya Dhyan (2018)</li>
                        <li>Dandi: Maatu, Vimarshe – Paramarshe (2022)</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Letter Literature</h4>
                    <ul>
                        <li>Inti Ninna Baapu (2013)</li>
                        <li>Manushya Maravaagabeku: Letters of John Keats (2021)</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Thought Literature</h4>
                    <ul>
                        <li>Badukabaarade Baduku (2020)</li>
                        <li>Anaad: Barahagaarana Marana Muttada Maatu (2022)</li>
                    </ul>
                </div>
                <div class="Bibliography-item mx-2">
                    <h4>Memoire</h4>
                    <ul>
                        <li>Yogasthah (2024) - Kannada, English, Hindi, Telugu & Marathi</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Ragam Movies</h4>
                    <ul>
                        <li>'Dandi', a film based on a novel (dialogue and lyrics), Kalyani Productions - 2022
                            <strong>Second Best Film Award</strong> at the 2021 International Film Festival
                        </li>
                        <li>'Nasab', a film based on Kriti (screenplay, dialogue, music, and lyrics) - 2024</li>
                    </ul>
                </div>

                <div class="Bibliography-item mx-2">
                    <h4>Performance Of Ragam Plays</h4>
                    <ul>
                        <li>'Gandhi's Last Days', Ranga Aradhana Troupe, Savadatti</li>
                        <li>'Letters to Death', Ranga Chandira, Bangalore - 2022</li>
                        <li>'Nasab', One Man Show, Green Stage Vijaya - 2022</li>
                    </ul>
                </div>


            </div>

        </div>
    </div>
    <!-- Skills Section -->
    <section id="books" class="books section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Books </h2>

        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row books-content books-animation">

                <!-- First Column with Image -->
                <div class="col-lg-6">
                    <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            @foreach ($books as $index => $book)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image"
                                        class="d-block w-100" style="height: auto;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>


                <!-- Second Column with Text and Button -->
                <div class="col-lg-6">
                    <h2 class="buy-copy">Buy Your Copy</h2>
                    <p class="text-justify"> Dr. Rajashekharayya G Mathapati (12 September 1971), popularly known by his pen name Ragam, is an
                        Indian
                        poet, playwright, novelist, and critic. He spent his early childhood in Chadachan, Karnataka, and
                        later
                        pursued his education in various locations, including Vijayapura, Solapur, Kolhapur, and Dharwad.
                        Ragam
                        has worked as a research assistant, lecturer, and is currently the head of the Department of English
                        at
                        G.F.G.C. Vijayanaga in Bangalore. His literary works have gained significant recognition, and he has
                        made
                        contributions to film direction as well. Ragam has received numerous awards, including the Gandhi
                        Memorial
                        Nidhi Award in 2012 for his work "Gandhi Anthima Dinagalu," the "Srivijaya Award" in 2013 from the
                        Kannada
                        Sahitya Parishat, and the Basava Puraskara in 2022. He is known for his novels such as "Jagadvandya
                        Bharatam" and "Dandi," as well as his poetry collections like "Arpane" and "Yaradu Dadagala Naduve."

                    </p>
                    <a href="{{route('User.book.bookview')}}" class="view-more">View More</a>
                </div>

            </div>
        </div>

    </section><!-- /Skills Section -->
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
                                <div class="blog-title">{{ Str::limit($blog->title,20) }}</div>
                                <a href="{{ route('User.blog.show', $blog->slug) }}" class="blog-button rounded-1">READ MORE</a>
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
    @endif
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
    <section id="contactForm" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-5">

                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>No. 24, 2nd Main, 1st Phase, West of Chord Road, Manjunath Nagar, Rajajinagar,
                                    Bengaluru - 560010</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+91 <a href="tele:9019740989 " style="color:black;">9019740989</a></p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p><a href="mailto:shreeragam71@gmail.com"> shreeragam71@gmail.com</a></p>
                            </div>
                        </div><!-- End Info Item -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4636.783131592138!2d77.54663657579805!3d12.996869687320771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d9039c84e7b%3A0xdace2112432c703!2s24%2C%202nd%20Main%20Rd%2C%201st%20Phase%2C%20Manjunath%20Nagar%2C%20Basaveshwar%20Nagar%2C%20Bengaluru%2C%20Karnataka%20560079!5e1!3m2!1sen!2sin!4v1740486480959!5m2!1sen!2sin"
                            frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="{{ route('User.email') }}" id="contactForm" method="post" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your Name</label>
                                <input type="text" name="name" id="name-field" class="form-control"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email-field"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject-field"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- /Contact Section -->
@endsection

@section('js')
@endsection
