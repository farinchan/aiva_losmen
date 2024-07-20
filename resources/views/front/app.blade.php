<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="author" content="Bellevue Theme" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords"
        content="html, html5, SEO, responsive, creative, fullscreen, business, samll business, multi purpose, bootstrap, bootstrap 4, google material design, material design, metro, metronic, start-up, ui/ux, html template, css3, css, branding, creative design, multipurpose, multi-purpose, parallax, personal, consulting, masonry, grid, carousel, agency, construction, ecommerce, landing, event, medical,eal-estate">
    <meta name="description"
        content="Bellevue is Professional Creative Template. Bellevue is a Powerful Responsive Multi-Purpose HTML5 CSS3 Template. Build whatever you like with this Template. We have included 6+ ready-to-use Homepages. What ever you are using the device your site will run as it should be. This template is fully responsive layout for all type of devices. Bellevue template coded with beautiful and clean codes! Some powerful HTML files 100% valid W3 web standards. Try out the demo." />
    <meta property="og:title" content="Bellevue || Creative Hostel Bootstrap 5 Template" />
    <!-- SITE TITLE -->
    <title>Bellevue || Creative Hostel Bootstrap 5 Template</title>
    <!-- Favicon Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/images/favicon/favicon-1.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon/favicon-2.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon/favicon-3.png') }}" sizes="16x16">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trirong:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Datepick CSS -->
    <link rel="stylesheet" href="{{ asset('front/plugin/datepick/css/jquery.datepick.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="{{ asset('front/plugin/slick/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugin/slick/css/slick.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <!-- jQuery JS -->
    <script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Datepick JS -->
    <script src="{{ asset('front/plugin/datepick/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('front/plugin/datepick/js/jquery.datepick.js') }}"></script>
</head>

<body>
    @include('front.partials.menu')

    @yield('content')

    @include('front.partials.footer')


    <!-- bootstrap JS -->
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <!-- Slick Slider JS -->
    <script src="{{ asset('front/plugin/slick/js/slick.min.js') }}"></script>
    <!-- custom JS -->
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <!-- Sweetalert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')

    @include('sweetalert::alert')


</body>

</html>
