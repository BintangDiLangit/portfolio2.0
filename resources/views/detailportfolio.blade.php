<!DOCTYPE html>
<html lang="en" data-color="color13">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bintang - Software Engineer</title>
    <!--Usefull Meta-->
    <meta name="description" content="Bintang Miftaqul Huda, Professional portfolio, freelancers or software engineer.">
    <meta name="keywords" content="bintangmfhd, resume, cv, vCard, portfolio, responsive, software engineer, programmer">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta property="og:title" content="Bintang - Software Engineer ">
    <meta property="og:description"
        content="Bintang Miftaqul Huda, Professional portfolio, freelancers or software engineer.">
    <meta property="og:image" content="https://bintangmfhd.com/assets/images/preview.png">
    <meta property="og:url" content="https://bintangmfhd.com/">
    <!--Favicon-->
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon_16x16.png') }}">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">
    <!--AOS Animation Stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <!--Magnific Popup-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--OWL Carousel-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">

    <!--Keyden Styelsheet with Bootstrap 5-->
    <link rel="stylesheet" href="{{ asset('assets/css/kayden_10.css') }}">
</head>

<body data-offset="102">
    <!--PRELOADER START-->
    <div id="preloader">
        <div class="text-center w-100">
            <div class="loader"></div>
        </div>
    </div>
    <!--PRELOADER END-->
    <!--Header START-->
    <header class="kayden-header sticky-top">
        <div class="header-inside transparent_header">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <!--Header Toggler START-->
                <div class="kayden-menu-toggler">
                    <a class="kayden-toggler text-reset" data-bs-toggle="offcanvas" href="#kaydenOffCanvas"
                        role="button" aria-controls="kaydenOffCanvas">
                        <div class="kt-r">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="kt-t">
                            MENU
                        </div>
                    </a>
                </div>
                <!--Header Toggler END-->
                <!--Header Info START-->
                <div class="kayden-nav-meta fs-5 fw-bold d-none d-sm-block text-end">
                    <a href="#" class="text-reset">{{ $data['title'] }}</a>
                </div>
                <!--Header Info END-->
            </div>
        </div>
    </header>
    <!--Header END-->
    <!--Off Canvas START-->
    <div class="offcanvas offcanvas-start" id="kaydenOffCanvas">
        <!--Off Canvas Header START-->
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!--Off Canvas Header END-->
        <!--Off Canvas Body START-->
        <div class="offcanvas-body">
            <div class="kayden-offcanvas-nav-container d-flex flex-column justify-content-center align-items-center">
                <!--Off Canvas Navigation START-->
                <ul class="kayden-offcanvas-nav list-inline">
                    <li class="py-3">
                        <a href="/#home"
                            class="kayden_scrollspy underline_animation underline_text text-reset fs-4 fw-bold"
                            data-bs-dismiss="offcanvas">Home</a>
                    </li>
                    <li class="py-3">
                        <a href="/#about"
                            class="kayden_scrollspy underline_animation underline_text text-reset fs-4 fw-bold"
                            data-bs-dismiss="offcanvas">About</a>
                    </li>
                    <li class="py-3">
                        <a href="/#portfolio"
                            class="kayden_scrollspy underline_animation underline_text text-reset fs-4 fw-bold"
                            data-bs-dismiss="offcanvas">Portfolio</a>
                    </li>
                    <li class="py-3">
                        <a href="/#faq"
                            class="kayden_scrollspy underline_animation underline_text text-reset fs-4 fw-bold"
                            data-bs-dismiss="offcanvas">FAQ</a>
                    </li>
                    <li class="py-3">
                        <a href="/#contact"
                            class="kayden_scrollspy underline_animation underline_text text-reset fs-4 fw-bold"
                            data-bs-dismiss="offcanvas">Contact</a>
                    </li>
                </ul>
                <!--Off Canvas Navigation END-->
            </div>
        </div>
        <!--Off Canvas Body END-->
    </div>
    <!--Off Canvas END-->
    <!--Home Section START-->
    <section id="home" class="home min-vh-100 d-flex">
        <!--Particle Background-->
        <div class="background-particle w-100 position-absolute top-0 left-0" id="particlebackground"
            data-config="{{ asset('assets/pj-config.json') }}">
        </div>
        <!--End of Particle Background-->
        <!--Home Container START-->
        <div class="container my-auto position-relative pe-none">
            <div class="row">
                <div class="offset-2 col-8 offset-md-2 col-md-8">
                    <div class="row gy-5">
                        <div class="col-md-12">
                            <div class="about-image h-100 w-100 d-flex align-items-center">
                                <img src="{{ $env . '/portofolio-images/' . $data['image'] }}"
                                    class="kayden_morph_animation img-fluid kayden-shadow fit-cover fit-left-top"
                                    alt="bintangmfhd Picture" data-aos="zoom-in" data-aos-duration="800">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center text-sm-end w-100 h-100 d-flex align-items-center">
                                <div class="w-100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                                    <p class="welcome_text fs-4"><span class="typed_text"
                                            data-options="{{ $data['title'] }}"></span>
                                    </p>
                                    <div class="home_button_area">
                                        <a href="{{ $data['linkPorto'] }}"
                                            class="btn btn-success kayden_scrollspy">Source Link</a>
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
                <img src="{{ $env . '/portofolio-images/' . $data['image'] }}" class="mb-3 ml-auto mr-auto"
                    width="90%" alt="">
                <div class="row w-100 mb-5 mt-4">
                    <!--About Section Details START-->
                    <div class="offset-md-1 col-md-12 mt-5 mt-md-0">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="about-details">
                                <h2 class="fs-3 fw-bold mb-5">{{ $data['title'] }}</h2>
                                <p class="text-white mb-5">{{ $data['description'] }}</p>
                                <p class="text-white mb-5">{{ $data['additional_description'] }}</p>
                                <a href="/" class="btn btn-outline-danger justify-content-end"
                                    title="">Back to main menu</a>
                            </div>
                        </div>
                    </div>
                    <!--About Section Details END-->
                </div>
            </div>
        </div>
    </section>
    <!--About Section END-->
    <!--Footer START-->
    <footer class="kayden-footer py-4">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center py-3">
                <!--Social Links START-->
                <ul class="social-links list-inline mb-4">
                    <li class="list-inline-item">
                        <a href="#" title="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" title="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" title="pinterest">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" title="git">
                            <i class="fab fa-git"></i>
                        </a>
                    </li>
                </ul>
                <!--Social Links END-->
                <!--Copyright START-->
                <p class="text-center m-0">2022 ©. bintangmfhd.</p>
                <!--Copyright END-->
            </div>
        </div>
    </footer>
    <!--Footer END-->
    <!--To TOP START-->
    <a href="#" class="toTop d-inline" id="return-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <!--To TOP END-->

    <!--Style switcher START-->
    <div id="color-switcher" class="d-flex flex-row">
        <div class="switcher-area">
            <h3 class="mb-4 mt-2">Choose your color</h3>
            <ul class="switcher-list">

            </ul>
        </div>
        <div class="switcher-button">
            <i class="fas fa-cog"></i>
        </div>
    </div>
    <!--Style switcher END-->

    <!--JavaScript START-->
    <!--Popper-->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!--JQuery-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!--AOS Animations-->
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <!--Particle JS-->
    <script src="{{ asset('assets/js/particles.min.js') }}"></script>
    <!--Jquery Easing -->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <!--Jquery Appear -->
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <!--Kayden preloader -->
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    <!--Jquery Count To -->
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <!--Masonry -->
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <!--Jquery Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--OWL Carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!--Typed JS -->
    <script src="{{ asset('assets/js/typed.min.js') }}"></script>
    <!--Kayden Alert -->
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <!--Kayden Contact US -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <!--Kayden Custom Script -->
    <script src="{{ asset('assets/js/kayden.js') }}"></script>
    <!--JavaScript END-->

    <script src="{{ asset('assets/js/switcher.js') }}"></script>
</body>

</html>
