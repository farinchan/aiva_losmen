@extends('front.app')
@section('content')
    <!-- Banner Section Start -->
    <div class="thmv-package-top-sec">
        <img src=" {{ asset("front/images/contact-top-banner-img.jpg") }}" alt="">
    </div>
    <!-- ======Banner Section End====== -->
    <!-- Header Section End -->

    <!-- Explore Grid Breadcrub Start-->
    <section class="thmv-packa-bred thmv-contact-bred">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="thmv-expo-bred">
                        <li><a href="#">Home - </a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <h2 class="thmv-expo-titlev2 text-uppercase">Hubungi Kami</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore Grid Breadcrub End-->

    <!-- getin touch section start -->
    <section class="thmv-get-in-touch thmv-contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 thmv-contact-info">
                    <ul>
                        <li>
                            <div class="thmv-info-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div>
                                <h5>Telepon Kami</h5>
                                <p><a href="tel:(0655) 7551771">(0655) 7551771</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Kirim Kami Email</h5>
                                <p><a href="mailto:info@aivalosmen.com">info@aivalosmen.com</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-info-icon">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                            <div>
                                <h5>Drop By and Talk</h5>
                                <p>Etiam cursus sapien quis ligula rhoncus, quis sollicitudin dolor ultricies. </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- getin touch section end -->

    <!-- full width map start -->
    <div class="container-fluid thmv-map-sec px-0">
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15917.4450901226!2d96.1318168!3d4.1491632!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303ec3955e81c1dd%3A0xff04b5d25eb442c2!2sLosmen%20Aiva!5e0!3m2!1sid!2sid!4v1721798194106!5m2!1sid!2sid"
                width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- full width map start -->
@endsection
