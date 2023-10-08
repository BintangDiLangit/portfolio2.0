<!DOCTYPE html>
<html lang="en" data-color="color13">

<head>
    <title>@yield('title')</title>
    @include('components/head')
</head>

<body data-offset="102">
    <!--PRELOADER START-->
    @include('components/preloader')
    <!--PRELOADER END-->
    <!--Header START-->
    @include('components/Header')
    <!--Header END-->
    <!--Off Canvas START-->
    @include('components/off_canvas')
    <!--Off Canvas END-->

    {{-- @include('articles/layouts/sidebar') --}}
    <section id="home" class="home min-vh-100 d-flex">
        @yield('main')
    </section>

    <!--Footer START-->
    @include('components/footer')
    <!--Footer END-->
    <!--To TOP START-->
    @include('components/to_top')
    <!--To TOP END-->

    <!--JavaScript START-->
    @include('components/script')
    <!--JavaScript END-->
</body>

</html>
