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
                        <div class="col-md-12">
                            <div class="about-image h-100 w-100 d-flex align-items-center">
                                <img src="{{ env('AWS_ENDPOINT') . '/storage/portofolio-images/' . $data['image'] }}"
                                    class="kayden_morph_animation img-fluid kayden-shadow fit-cover fit-left-top"
                                    alt="bintangmfhd Picture" data-aos="zoom-in" data-aos-duration="800"
                                    alt="Bintang Miftaqul Huda - {{ $data['title'] }}" loading="lazy">
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
                <img src="{{ env('AWS_ENDPOINT') . '/storage/portofolio-images/' . $data['image'] }}"
                    class="mb-3 ml-auto mr-auto" width="90%" alt="Bintang Miftaqul Huda - {{ $data['title'] }}"
                    loading="lazy">
                <div class="row w-100 mb-5 mt-4">
                    <!--About Section Details START-->
                    <div class="offset-md-1 col-md-12 mt-5 mt-md-0">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="about-details">
                                <h2 class="fs-3 fw-bold mb-5">{{ $data['title'] }}</h2>
                                <p class="text-white mb-5">{{ $data['description'] }}</p>
                                <p class="text-white mb-5">{{ $data['additional_description'] }}</p>
                                <a href="/" class="btn btn-outline-danger justify-content-end" title="">Back
                                    to main menu</a>
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
    @include('components/footer')
    <!--Footer END-->
    <!--To TOP START-->
    @include('components/to_top')
    <!--To TOP END-->

    <!--JavaScript START-->
    @include('components.script')
    <!--JavaScript END-->
</body>

</html>
