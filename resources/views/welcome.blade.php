<!DOCTYPE html>
<html lang="en" data-color="color13">

<head>

    @include('components/head')
    <title>Bintang - Software Engineer</title>
</head>

<body data-offset="102">
    <!--PRELOADER START-->
    @include('components/preloader')
    <!--PRELOADER END-->
    <!--Header START-->
    @include('components/header')
    <!--Header END-->
    <!--Off Canvas START-->
    @include('components/off_canvas')
    <!--Off Canvas END-->
    <!--Home Section START-->
    <section id="home" class="home min-vh-100 d-flex">
        <!--Home Container START-->
        <div class="container my-auto position-relative pe-none">
            <div class="row">
                <div class="offset-2 col-8 offset-md-2 col-md-8">
                    <div class="row gy-5">
                        <div class="col-md-6">
                            <div class="about-image h-100 w-100 d-flex align-items-center">
                                <img src="{{ env('AWS_ENDPOINT') . '/storage/main_image/' . $dataSeo['main_image'] }}"
                                    class="kayden_morph_animation img-fluid kayden-shadow fit-cover fit-left-top"
                                    alt="bintangmfhd Picture" data-aos="zoom-in" data-aos-duration="800"
                                    alt="Bintang Miftaqul Huda" loading="lazy">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center text-sm-end w-100 h-100 d-flex align-items-center">
                                <div class="w-100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                                    <p class="welcome_text fs-4"><span class="typed_text"
                                            data-options="{{ $dataSeo['job_title'] }}"></span></p>
                                    <h1 class="fs-2 fw-bold d-inline-block typed_text mb-5">I'm
                                        {{ strtok($dataSeo['name'], ' ') }}
                                    </h1>
                                    <div class="home_button_area">
                                        <a href="#portfolio" class="btn btn-primary kayden_scrollspy">My Portfolio</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Home Container END-->
        <!--Scroll Down START-->
        <div class="scroll-down">
            <a href="#about" class="kayden_scrollspy scroll-down-link text-center">
                <div class="scroll-title">Scroll Down</div>
                <div class="scroll-mouse">
                    <div class="whell"></div>
                </div>
            </a>
        </div>
        <!--Scroll Down END-->
    </section>
    <!--Home Section END-->
    <!--About Section START-->
    <section id="about" class="secondary-section">
        <div class="container h-100">
            <div class="about_inside w-100 h-100 d-flex justify-content-center align-items-center flex-wrap">
                <div class="row w-100 mb-5">
                    <!--About Section Details START-->
                    <div class="offset-md-1 col-md-5 mt-5 mt-md-0">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="about-details">
                                <h1 class="fs-3 fw-bold mb-5">{{ $dataSeo['name'] }}</h1>
                                <p class="text-secondary mb-5">{{ $dataSeo['introducing'] }}</p>
                                <!--Social Links START-->
                                <ul class="social-links list-inline mb-5">
                                    <li class="list-inline-item">
                                        <a href="{{ $dataSeo['instagram'] }}" title="instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $dataSeo['linkedin'] }}" title="linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $dataSeo['medium'] }}" title="medium">
                                            <i class="fab fa-medium"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ $dataSeo['github'] }}" title="github">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!--Social Links END-->
                                <a href="{{ env('AWS_ENDPOINT') . '/storage/file-cv/' . $cv['path'] }}"
                                    class="btn btn-outline-primary" title="Download CV">Download CV</a>
                            </div>
                        </div>
                    </div>
                    <!--About Section Details END-->
                    <!--About Section Progress START-->
                    <div class="offset-md-1 col-md-5 mt-5 mt-md-0">
                        <div class="skills_container">
                            <h2 class="fs-3 mb-5 fw-bold">My Skills</h2>
                            <!--Progress Bar START-->
                            @foreach ($skills as $item)
                                <div class="mb-4">
                                    <label class="mb-3 fs-6">{{ $item['skill_name'] }}</label>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-loadAnimation" data-percent="100"
                                            style="width: 0%;" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--About Section Progress END-->
                </div>
                <!--Facts START-->
                <div class="row w-100 g-5 g-md-0">
                    <div class="col-6 col-md-3">
                        <!--Facts Item START-->
                        <div class="fact d-flex flex-column align-items-center align-items-center">
                            <h3 class="fs-2 d-inline-block"><span class="tmcounter" data-from="0"
                                    data-to="{{ $dataSeo['years_experience'] }}" data-speed="1500">0</span><sup>+</sup>
                            </h3>
                            <p class="fs-4 d-inline-block text-center text-md-left">Years Experience</p>
                        </div>
                        <!--Facts Item END-->
                    </div>
                    <div class="col-6 col-md-3">
                        <!--Facts Item START-->
                        <div class="fact d-flex flex-column align-items-center align-items-center">
                            <h3 class="fs-2 d-inline-block"><span class="tmcounter" data-from="0"
                                    data-to="{{ $dataSeo['happy_clients'] }}" data-speed="1500">0</span><sup>+</sup>
                            </h3>
                            <p class="fs-4 d-inline-block text-center text-md-left">Client Testimonials</p>
                        </div>
                        <!--Facts Item END-->
                    </div>
                    <div class="col-6 col-md-3">
                        <!--Facts Item START-->
                        <div class="fact d-flex flex-column align-items-center align-items-center">
                            <h3 class="fs-2 d-inline-block"><span class="tmcounter" data-from="0"
                                    data-to="{{ $dataSeo['winning_competitions'] }}" data-speed="1500">0</span></h3>
                            <p class="fs-4 d-inline-block text-center text-md-left">Winning Competitions</p>
                        </div>
                        <!--Facts Item END-->
                    </div>
                    <div class="col-6 col-md-3">
                        <!--Facts Item START-->
                        <div class="fact d-flex flex-column align-items-center align-items-center">
                            <h3 class="fs-2 d-inline-block"><span class="tmcounter" data-from="0"
                                    data-to="{{ $dataSeo['project_done'] }}" data-speed="1500">0</span></h3>
                            <p class="fs-4 d-inline-block text-center text-md-left">Projects done</p>
                        </div>
                        <!--Facts Item END-->
                    </div>
                </div>
                <!--Facts END-->
            </div>
        </div>
    </section>
    <!--About Section END-->
    <!--Services Section START-->
    <section id="services">
        <div class="container">
            <!--Section Heading START-->
            <div class="heading text-center mb-5">
                <h2 class="fs-3 kayden-underline-left mb-5 fw-bold text-uppercase d-inline-block">Technology I Use
                </h2>
            </div>
            <!--Section Heading END-->
            <!--Section Body START-->
            <div class="section-body">
                <!--Gradient Grid START-->
                <div class="kayden-gradient-grid">
                    <!--Gradient Grid ROW START-->
                    <div class="row g-0">
                        <!--Gradient Grid Item START-->
                        <div class="col-lg-4 text-center">
                            <div class="p-5">
                                <div class="fs-3 mb-3">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h4 class="mb-3">Language</h4>
                                <p class="text-secondary">PHP, Javascript, Golang, Java</p>
                            </div>
                        </div>
                        <!--Gradient Grid Item END-->
                        <!--Gradient Grid Item START-->
                        <div class="col-lg-4 text-center">
                            <div class="p-5">
                                <div class="fs-3 mb-3">
                                    <i class="fas fa-server"></i>
                                </div>
                                <h4 class="mb-3">Framework Backend</h4>
                                <p class="text-secondary">Gorilla Mux, Laravel, Lumen.</p>
                            </div>
                        </div>
                        <!--Gradient Grid Item END-->
                        <!--Gradient Grid Item START-->
                        <div class="col-lg-4 text-center">
                            <div class="p-5">
                                <div class="fs-3 mb-3">
                                    <i class="fas fa-mug-hot"></i>
                                </div>
                                <h4 class="mb-3">VCS</h4>
                                <p class="text-secondary">Github, Gitlab, BitBucket.</p>
                            </div>
                        </div>
                        <!--Gradient Grid Item END-->
                    </div>
                    <!--Gradient Grid ROW END-->
                    <!--Gradient Grid ROW START-->
                    <div class="row g-0">
                        <!--Gradient Grid Item START-->
                        <div class="col-lg-4 text-center">
                            <div class="p-5">
                                <div class="fs-3 mb-3">
                                    <i class="far fa-clone"></i>
                                </div>
                                <h4 class="mb-3">Framework Frontend</h4>
                                <p class="text-secondary">Bootstrap, Jquery, React</p>
                            </div>
                        </div>
                        <!--Gradient Grid Item END-->
                        <!--Gradient Grid Item START-->
                        <div class="col-lg-4 text-center">
                            <div class="p-5">
                                <div class="fs-3 mb-3">
                                    <i class="far fa-heart"></i>
                                </div>
                                <h4 class="mb-3">OS</h4>
                                <p class="text-secondary">Linux (Parrot, Ubuntu, Kali Linux, Manjaro), Windows</p>
                            </div>
                        </div>
                        <!--Gradient Grid Item END-->
                        <!--Gradient Grid Item START-->
                        <div class="col-lg-4 text-center">
                            <div class="p-5">
                                <div class="fs-3 mb-3">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <h4 class="mb-3">Cloud & Hosting</h4>
                                <p class="text-secondary">AWS, Hostinger</p>
                            </div>
                        </div>
                        <!--Gradient Grid Item END-->
                    </div>
                    <!--Gradient Grid ROW END-->
                </div>
                <!--Gradient Grid END-->
            </div>
            <!--Section Body END-->
        </div>
    </section>
    <!--Services Section END-->
    <!--Portfolio Section START-->
    <section id="portfolio">
        <div class="container">
            <!--Section Heading START-->
            <div class="heading text-center mb-5">
                <h2 class="fs-3 kayden-underline-left mb-5 fw-bold text-uppercase d-inline-block">Portfolio</h2>
            </div>
            <!--Section Heading END-->
            <!--Section Body START-->
            <div class="section-body">
                <!--Masonry Grid Container START-->
                <div class="row gy-4 grid" id="loadPortfolio">
                    <!--Masonry Grid Item START-->
                    @foreach ($portfolios as $item)
                        <div class="col-md-6 col-lg-3 grid-item">
                            <a href="/detail-portfolio/{{ $item['id'] }}" {{-- class="portfolio-item portfolio-ajax underline_animation text-reset"> --}}
                                class="portfolio-item underline_animation text-reset">
                                <div class="portfolio-thumbnail">
                                    <img src="{{ env('AWS_ENDPOINT') . '/storage/portofolio-images/' . $item['image'] }}"
                                        class="img-fluid img-grayTransition"
                                        alt="Bintang Miftaqul Huda - {{ $item['title'] }}">
                                </div>
                                <div class="portfolio-description my-3">
                                    <h3 class="fs-5 underline_text fw-bold d-inline-block">{{ $item['title'] }}</h3>
                                    <span
                                        class="d-block fw-light small-font-size">{{ substr($item['description'], 0, 15) . '..' }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <!--Masonry Grid Item END-->
                </div>
                <button id="loadMore" class="btn btn-secondary text-end">Load More</button>
                <!--Masonry Grid Container END-->
            </div>
            <!--Section Body START-->
        </div>
    </section>
    <!--Portfolio Section END-->
    <!--Education Section START-->

    <section id="awardee" class="secondary-section">
        <div class="container">
            <!--Section Heading START-->
            <div class="heading text-center mb-5">
                <h2 class="fs-3 kayden-underline-left mb-5 fw-bold text-uppercase d-inline-block">Awardee</h2>
            </div>
            <!--Section Heading END-->
            <!--Section Body START-->
            <div class="section-body">
                <div class="table-responsive">
                    <!--Educational Table START-->
                    <table class="table">
                        <tbody>
                            @foreach ($awardees as $awardee)
                                <tr>
                                    <td class="d-table-cell d-sm-none">
                                        <div class="mb-3 fw-light">{{ $awardee['date'] }}</div>
                                        <div class="mb-3 fw-bold">{{ $awardee['title'] }}</div>
                                        <div></div>
                                    </td>
                                    <td class="w-25 d-none d-sm-table-cell">
                                        <span class="fw-light fs-5">{{ $awardee['date'] }}</span>
                                    </td>
                                    <td class="w-50 d-none d-sm-table-cell">
                                        <a href="{{ $awardee['link'] }}" class="underline_animation text-reset">
                                            <span
                                                class="fw-bold fs-5 underline_text d-inline-block">{{ $awardee['title'] }}</span>
                                            <br>
                                            <div class="portfolio-thumbnail">
                                                <img src="{{ env('AWS_ENDPOINT') . '/storage/competition-images/' . $awardee['image'] }}"
                                                    class="img-fluid img-grayTransition mt-5"
                                                    alt="Bintang Miftaqul Huda - {{ $awardee['title'] }}"
                                                    loading="lazy" width="60%">
                                            </div>
                                        </a>
                                    </td>
                                    <td class="w-25 d-none d-sm-table-cell">
                                        <span class="fw-normal text-secondary">{{ $awardee['desc'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--Educational Table END-->
                </div>
            </div>
            <!--Section Body END-->
        </div>
    </section>

    <section id="education" class="secondary-section">
        <div class="container">
            <!--Section Heading START-->
            <div class="heading text-center mb-5">
                <h2 class="fs-3 kayden-underline-left mb-5 fw-bold text-uppercase d-inline-block">Education</h2>
            </div>
            <!--Section Heading END-->
            <!--Section Body START-->
            <div class="section-body">
                <div class="table-responsive">
                    <!--Educational Table START-->
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="d-table-cell d-sm-none">
                                    <div class="mb-3 fw-light">2019-2022</div>
                                    <div class="mb-3 fw-bold">Maulana Malik Ibrahim State Islamic University of
                                        Malang, Indonesia</div>
                                    <div></div>
                                </td>
                                <td class="w-25 d-none d-sm-table-cell">
                                    <span class="fw-light fs-5">2019-2022</span>
                                </td>
                                <td class="w-50 d-none d-sm-table-cell">
                                    <span class="fw-bold fs-5">Maulana Malik Ibrahim State Islamic University of
                                        Malang, Indonesia</span>
                                </td>
                                <td class="w-25 d-none d-sm-table-cell">
                                    <span class="fw-normal text-secondary">Informatics Engineering </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--Educational Table END-->
                </div>
            </div>
            <!--Section Body END-->
        </div>
    </section>
    <!--Education Section END-->
    <!--Testimonials START-->
    <section id="testimonials" class="secondary-section">
        <div class="container">
            <!--Section Heading START-->
            <div class="heading text-center mb-5">
                <h2 class="fs-3 kayden-underline-left mb-5 fw-bold text-uppercase d-inline-block">Testimonials</h2>
            </div>
            <!--Section Heading END-->
            <!--Section Body START-->
            <div class="section-body">
                <div class="testimonials-header mb-5">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="text-primary fs-1">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <!--OWL Slider START-->
                    <div id="client_slider" class="owl-carousel">
                        <!--OWL Slider Item START-->
                        @foreach ($testimonials as $item)
                            <div class="offset-1 col-10">
                                <div class="row">
                                    <div class="col-md-6 order-2 order-md-1">
                                        <div class="testimonial_details">
                                            <p class="text-secondary mb-3">{{ $item['clientMessage'] }}</p>
                                            <span
                                                class="font-family-secondary fs-5 fw-light fst-italic">--{{ $item['name'] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 order-1 order-md-2">
                                        <div
                                            class="testimonial_thumbnail d-flex justify-content-start justify-content-md-end">
                                            <img src="{{ env('AWS_ENDPOINT') . '/storage/client-images/' . $item['photo'] }}"
                                                class="kayden-shadow rounded-3 w-auto"
                                                alt="Bintang Miftaqul Huda - {{ $item['name'] }}" loading="lazy"
                                                height="300rem">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--OWL Slider Item END-->

                    </div>
                    <!--OWL Slider END-->
                </div>
            </div>
            <!--Section Body END-->
        </div>

    </section>
    <!--Testimonials END-->
    <!--Contact Us START-->
    <section id="contact" class="secondary-section">
        <div class="container">
            <!--Section Heading START-->
            <div class="heading text-center mb-5">
                <h2 class="fs-3 kayden-underline-left mb-5 fw-bold text-uppercase d-inline-block">Contact Us</h2>
            </div>
            <!--Section Heading END-->
            <!--Section Body START-->
            <div class="section-body">
                <div class="row gy-5">
                    <div class="col-md-6">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <!--Contact Details START-->
                            <div class="contact-details d-flex flex-row align-items-center mb-3">
                                <div class="cd-icon fs-2 me-4">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="cd-info fs-5 font-family-secondary">
                                    <a href="mailto:{{ $dataSeo['email'] }}" class="text-reset">
                                        <span class="__cf_email__"
                                            data-cfemail="741f150d10111a34110c15190418115a171b19">{{ $dataSeo['email'] }}</span>
                                    </a>
                                </div>
                            </div>
                            <!--Contact Details END-->
                            <!--Contact Details START-->
                            <div class="contact-details d-flex flex-row align-items-center mb-3">
                                <div class="cd-icon fs-2 me-4">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="cd-info fs-5 font-family-secondary text-reset">
                                    {{ $dataSeo['address'] }}
                                </div>
                            </div>
                            <!--Contact Details END-->
                            <!--Contact Details START-->
                            <div class="contact-details d-flex flex-row align-items-center">
                                <div class="cd-icon fs-2 me-4">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="cd-info fs-5 font-family-secondary">
                                    <a href="#" class="text-reset">
                                        {{ $dataSeo['phone_number'] }}
                                    </a>
                                </div>
                            </div>
                            <!--Contact Details END-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="mb-5 fs-4 text-center text-sm-left">Or Let's start to conversation</h3>
                        <form action="{{ route('send.email') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <input type="text" style="color: white; background-color: black" name="full_name"
                                    id="name" placeholder="Full name" class="form-control">
                            </div>
                            <div class="mb-4">
                                <input type="email" style="color: white; background-color: black" name="email"
                                    id="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="mb-4">
                                <input type="text" style="color: white; background-color: black" name="subject"
                                    id="subject" placeholder="Subject" class="form-control">
                            </div>
                            <div class="mb-4">
                                <textarea placeholder="Message" style="color: white; background-color: black" name="message" name="text"
                                    id="text" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="mb-4">
                                <button type="submit" id="contact-btn" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Section Body END-->
        </div>
    </section>
    <!--Contact Us END-->
    <!--Footer START-->
    @include('components/footer')
    <!--Footer END-->
    <!--To TOP START-->
    @include('components/to_top')
    <!--To TOP END-->

    <!--JavaScript START-->
    @include('components.script')
    <!--JavaScript END-->

    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>

    <script>
        let msnry;
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Masonry
            msnry = new Masonry('#loadPortfolio', {
                itemSelector: '.grid-item',
                columnWidth: '.grid-item', // or whatever suits your layout
                percentPosition: true
            });

            let loadedPortfolios = 10;
            const totalPortfolios = @json($dataSeo['project_done']);

            document.getElementById('loadMore').addEventListener('click', function() {
                fetch(`/load-more-portfolios?skip=${loadedPortfolios}`)
                    .then(response => response.json())
                    .then(data => {
                        let newItems = [];
                        data.forEach(item => {
                            let loadHtmlPorto = `
                    <div class="col-md-6 col-lg-3 grid-item">
                        <a href="/detail-portfolio/${item.id}" class="portfolio-item underline_animation text-reset">
                            <div class="portfolio-thumbnail">
                                <img src="{{ env('AWS_ENDPOINT') }}/{{ env('AWS_BUCKET') }}/storage/portofolio-images/${item.image}" class="img-fluid img-grayTransition" 
                                alt="Bintang Miftaqul Huda - ${item.title}">
                            </div>
                            <div class="portfolio-description my-3">
                                <h3 class="fs-5 underline_text fw-bold d-inline-block">${item.title}</h3>
                                <span class="d-block fw-light small-font-size">${item.description.substring(0, 15)}..</span>
                            </div>
                        </a>
                    </div>`;

                            const div = document.createElement('div');
                            div.innerHTML = loadHtmlPorto.trim();
                            const newItem = div.firstChild;
                            document.getElementById('loadPortfolio').appendChild(newItem);
                            newItems.push(newItem);
                        });

                        imagesLoaded(document.getElementById('loadPortfolio'), function() {
                            msnry.appended(newItems);
                            msnry.layout();
                        });

                        loadedPortfolios += data.length;

                        if (loadedPortfolios >= totalPortfolios) {
                            document.getElementById('loadMore').style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.log('Fetch error: ', error);
                    });
            });
        });

        function debounce(func, wait) {
            let timeout;
            return function() {
                const context = this,
                    args = arguments;
                const later = function() {
                    timeout = null;
                    func.apply(context, args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        };

        // Debounce the resize event
        window.addEventListener('load', function() {
            msnry.layout();
        });

        window.addEventListener('resize', debounce(function() {
            msnry.destroy();
            msnry = new Masonry('#loadPortfolio', {
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                percentPosition: true
            });
        }, 150));
    </script>
</body>

</html>
