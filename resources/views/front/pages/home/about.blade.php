@extends('front.app')
@section('content')
    <!-- Banner Section Start -->
    <div class="thmv-package-top-sec">
        <img src="{{ asset('front/images/aboutus/about-us-top-banner.jpg') }}" alt="">
    </div>
    <!-- ======Banner Section End====== -->

    <!-- Explore Grid Breadcrub Start-->
    <section class="thmv-packa-bred thmv-about-bred">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="thmv-expo-bred">
                        <li><a href="#">Home - </a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                    <h2 class="thmv-expo-titlev2">Tentang kami</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore Grid Breadcrub End-->

    <!-- our history Grid Section Start -->
    <div class="thmv-about thmv-our-history">
        <div class="container">
            <div class="row thmv-about-info align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="thmv-expogird-info">
                        <div class="thmv-expo-name thmv-paragraph thmv-br-none">
                            <p>Aiva Losmen Menjadi tempat penginapan yang menawarkan kenyamanan dan keamanan bagi para tamu
                                yang menginap. Dengan harga yang terjangkau dan fasilitas yang lengkap, kami berkomitmen
                                memberikan pelayanan terbaik bagi para tamu yang menginap di Aiva Losmen.</p><br>
                            <p>
                                Aiva Losmen berdiri sejak tahun 2010 dan telah melayani ribuan tamu yang menginap di Aiva
                                Losmen. Dengan pengalaman yang telah kami miliki, kami berkomitmen untuk terus memberikan
                                pelayanan terbaik bagi para tamu yang menginap di Aiva Losmen.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="thmv-expogird-img row thmv-img-gray-hover">
                        <img class="col-lg-6 col-md-6 col-6 img-fluid"
                            src="{{ asset('front/images/our-history/our-history-info-img.jpg') }}" alt="History image">
                        <img class="col-lg-6 col-md-6 col-6 img-fluid"
                            src="{{ asset('front/images/our-history/our-history-info-img-1.jpg') }}" alt="History image">
                    </div>
                </div>
            </div>
            <div class="row thmv-about-info align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="thmv-expogird-img row thmv-img-gray-hover">
                        <img class="col-lg-12 col-md-12 col-12 img-fluid"
                            src="{{ asset('front/images/our-history/our-history-block-1.jpg') }}"
                            alt="History image">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="thmv-expogird-info">
                        <div class="thmv-expo-name thmv-paragraph thmv-br-none">
                            <p>
                                Kamar-kamar yang kami sediakan di Aiva Losmen memiliki fasilitas yang lengkap dan nyaman untuk para tamu yang menginap. 
                                Dengan Pelayanan kami, kami akan memanjakan para tamu yang menginap di Aiva Losmen. 
                            </p><br>
                            <p>
                                Aiva Losmen memiliki beberapa jenis kamar yang dapat dipilih oleh para tamu yang menginap di Aiva Losmen. 
                                Dengan harga yang terjangkau, kami berkomitmen memberikan pelayanan terbaik bagi para tamu yang menginap di Aiva Losmen.
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our history Grid Section End -->
@endsection
