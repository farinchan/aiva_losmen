@extends('front.app')
@section('content')
    <!-- ======Top Menu End====== -->
    <!-- Banner Section Start -->
    <section class="thmv-main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 ">
                    <div class="thmv-banner-title thmv-bg-glass">
                        <h1>TRAVELLERS CHOICE <br>AWARD 2019</h1>
                        <p class="opacity-full">Take a deep dive and try our list of over 40 unique generators, find
                            placeholder images for your next design, or add a lorem ipsum plugin to the CMS or text editor
                            of your choice.</p>
                        <a href="#" class="btn-full-filled">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking section start -->
    <div class="thmv-search-form border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <form class="thmv-search-form-tour">
                    <div class="thmv-field-search">
                        <div class="row thmv-tour-row justify-content-center">
                            <div class="ps-0 col-lg-6 col-md-12 thmv-date-col">
                                <div class="thmv-check-form d-flex">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-in-out" id="popupDatepickerfrom1"
                                            placeholder="Check-in Date" name="dates">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control check-in-out" id="popupDatepickerto1"
                                            placeholder="Check-out Date" name="dates">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 dropdown form-select-guests thmv-guest-col">
                                <div class="form-group">
                                    <div class="form-content dropdown-toggle" data-toggle="dropdown">
                                        <div class="wrapper-more">
                                            <div class="render">
                                                <span class="adults"><span class="one d-none">2 adults</span> <span
                                                        class="multi" data-html=":count Adults">2 adults</span></span>,
                                                <span class="children">
                                                    <span class="one d-none" data-html=":count Child">1 Child</span>
                                                    <span class="multi" data-html=":count Children">0 children</span>
                                                </span>
                                                <i class="fas fa-user-friends thmv-peoples-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu select-guests-dropdown"
                                        style="display: none; position: absolute; transform: translate3d(5px, 82px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <input type="hidden" name="adults" value="4">
                                        <input type="hidden" name="children" value="5">
                                        <div class="dropdown-item-row">
                                            <div class="label">adults</div>
                                            <div class="val">
                                                <span class="btn-minus" data-input="adults"><i
                                                        class="fas fa-minus"></i></span>
                                                <span class="count-display">4</span>
                                                <span class="btn-add" data-input="adults"><i class="fas fa-plus"></i></span>
                                            </div>
                                        </div>
                                        <div class="dropdown-item-row m-0">
                                            <div class="label">children</div>
                                            <div class="val">
                                                <span class="btn-minus" data-input="children"><i
                                                        class="fas fa-minus"></i></span>
                                                <span class="count-display">5</span>
                                                <span class="btn-add" data-input="children"><i
                                                        class="fas fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12 pe-0">
                                <div class="thmv-promo-box d-flex">
                                    <div class="form-group p-0">
                                        <button class="thmv-tour-search btn-full-filled border-0"
                                            type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- booking section End -->
    <!-- ======Banner Section End====== -->

    <!-- Header Section End -->
    <!-- facilities section start -->
    <section class="thmv-facilities-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="thmv-facilities-img">
                        <img src="{{ asset('front/images/facilities/residence-img.jpg') }}" alt="">
                    </div>
                    <div class="thmv-facilities-info">
                        <h5><strong>R</strong>esidence</h5>
                        <p class="thmv-p-light">32 spacious rooms and 4 cottages, made in the style of the unique New York,
                            Stockholm and Paris, as well as a whole loft-style building.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="thmv-facilities-img">
                        <img src="{{ asset('front/images/facilities/gastronomy-img.jpg') }}" alt="">
                    </div>
                    <div class="thmv-facilities-info">
                        <h5><strong>G</strong>astronomy</h5>
                        <p class="thmv-p-light">Our restaurants offer cuisine of the highest standard: Russian, European,
                            barbecue menus and culinary delights with a touch of exotic from our chef.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="thmv-facilities-img">
                        <img src="{{ asset('front/images/facilities/wellness-spa-img.jpg') }}" alt="">
                    </div>
                    <div class="thmv-facilities-info">
                        <h5><strong>W</strong>ellness & SPA</h5>
                        <p class="thmv-p-light">An oasis of peace and well-being! Great health and elated mood are born
                            here, and sport turns into relaxation. Choose for the best!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="thmv-facilities-img">
                        <img src="{{ asset('front/images/facilities/events-img.jpg') }}" alt="">
                    </div>
                    <div class="thmv-facilities-info">
                        <h5><strong>E</strong>vents</h5>
                        <p class="thmv-p-light">We have everything for organizing business events, weddings and outdoor
                            activities: convenient transport links, fresh air, competent staff.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- facilities section End -->
    <!-- our hotel section start -->
    <section class="thmv-our-hotel container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="thmv-sec-title text-center">
                        <h2 class="thmv-title-effect-center text-uppercase">Our hotel</h2>
                    </div>
                    <div class="thmv-hotel-info w-75 mx-auto text-center">
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                            or web designs. The passage is attributed to an unknown typesetter in the 15th century who is
                            thought to have scrambled parts of Cicero's De Finibus</p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row thmv-slick-img-slider">
            <div class="slick-image-center slider thmv-img-gray-hover">
                <div>
                    <img src="{{ asset('front/images/slider-img/slid-1.jpg') }}" alt="Slider image">
                </div>
                <div>
                    <img src="{{ asset('front/images/slider-img/slid-2.jpg') }}" alt="Slider image">
                </div>
                <div>
                    <img src="{{ asset('front/images/slider-img/slid-3.jpg') }}" alt="Slider image">
                </div>
            </div>
        </div>
    </section>
    <!-- our hotel section end -->
    <!-- Welcome to Paradise! section start -->
    <section class="thmv-welcome-sec thmv-bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 thmv-wel-text">
                    <h2 class="thmv-br-mob-none">Welcome to <br>Paradise!</h2>
                    <a href="#" class="btn-outline-light" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class="fas fa-play"></i>&nbsp;&nbsp; Watch the video</a>
                    <!-- Modal Start -->
                    <div class="row thmv-video-sec">
                        <div class="col-lg-12 thmv-video-modal">
                            <div class="modal-dialog modal-dialog-centered m-0">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="fas fa-times"></i></button>
                                                <div class="embed-container">
                                                    <iframe src="https://www.youtube.com/embed/EngW7tLk6R8" allowfullscreen
                                                        allow="autoplay;"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                </div>
                <div class="col-lg-6 offset-lg-1 thmv-wel-info">
                    <div class="thmv-paragraph">
                        <p class="mb-4">Aenean hendrerit maximus aliquet. Pellentesque interdum odio dui, vitae eleifend
                            nibh aliquet ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                            cubilia Curae; Nunc diam lorem, condimentum non justo. Etiam rhoncus finibus lorem sit amet
                            ullamcorper.</p>
                        <p>The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph,
                            page, etc.) that doesn't distract from the layout. A practice not without controversy, laying
                            out pages with meaningless.</p>
                    </div>
                    <div class="thmv-brand-logo">
                        <img src="{{ asset('front/images/brand-logo/travelweek-logo.png') }}" alt="">
                        <img src="{{ asset('front/images/brand-logo/tower-homes-logo.png') }}" alt="">
                        <img src="{{ asset('front/images/brand-logo/aero-logo.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome to Paradise! section  End -->
    <!-- Rooms & Suites section start -->
    <section class="thmv-rooms-suites container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="thmv-sec-title text-center">
                        <h2 class="thmv-title-effect-center text-uppercase">Rooms & Suites</h2>
                    </div>
                    <div class="thmv-rooms-info w-50 mx-auto text-center">
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                            or web designs. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row thmv-rooms-img-slider">
            <div class="slick-rooms-slider slider">
                <div class="thmv-img-gray-hover">
                    <div class="thmv-room-view">
                        <img src="{{ asset('front/images/rooms-suites-img/room-1.jpg') }}" alt="Slider image">
                        <div class="thmv-room-price thmv-bg-glass">
                            <p>From 50$</p>
                        </div>
                    </div>
                    <div class="thmv-room-info">
                        <h5>SIGNATURE SUITE</h5>
                        <h6>Sleeps 2, Queen Bed</h6>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is text used in laying out print, graphic or web
                            designs. </p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="thmv-img-gray-hover">
                    <div class="thmv-room-view">
                        <img src="{{ asset('front/images/rooms-suites-img/room-2.jpg') }}" alt="Slider image">
                        <div class="thmv-room-price thmv-bg-glass">
                            <p>From 50$</p>
                        </div>
                    </div>
                    <div class="thmv-room-info">
                        <h5>SIGNATURE SUITE</h5>
                        <h6>Sleeps 2, Queen Bed</h6>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is text used in laying out print, graphic or web
                            designs. </p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="thmv-img-gray-hover">
                    <div class="thmv-room-view">
                        <img src="{{ asset('front/images/rooms-suites-img/room-3.jpg') }}" alt="Slider image">
                        <div class="thmv-room-price thmv-bg-glass">
                            <p>From 50$</p>
                        </div>
                    </div>
                    <div class="thmv-room-info">
                        <h5>SIGNATURE SUITE</h5>
                        <h6>Sleeps 2, Queen Bed</h6>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is text used in laying out print, graphic or web
                            designs. </p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="thmv-img-gray-hover">
                    <div class="thmv-room-view">
                        <img src="{{ asset('front/images/rooms-suites-img/room-4.jpg') }}" alt="Slider image">
                        <div class="thmv-room-price thmv-bg-glass">
                            <p>From 50$</p>
                        </div>
                    </div>
                    <div class="thmv-room-info">
                        <h5>SIGNATURE SUITE</h5>
                        <h6>Sleeps 2, Queen Bed</h6>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is text used in laying out print, graphic or web
                            designs. </p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="thmv-img-gray-hover">
                    <div class="thmv-room-view">
                        <img src="{{ asset('front/images/rooms-suites-img/room-1.jpg') }}" alt="Slider image">
                        <div class="thmv-room-price thmv-bg-glass">
                            <p>From 50$</p>
                        </div>
                    </div>
                    <div class="thmv-room-info">
                        <h5>SIGNATURE SUITE</h5>
                        <h6>Sleeps 2, Queen Bed</h6>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is text used in laying out print, graphic or web
                            designs. </p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="thmv-img-gray-hover">
                    <div class="thmv-room-view">
                        <img src="{{ asset('front/images/rooms-suites-img/room-2.jpg') }}" alt="Slider image">
                        <div class="thmv-room-price thmv-bg-glass">
                            <p>From 50$</p>
                        </div>
                    </div>
                    <div class="thmv-room-info">
                        <h5>SIGNATURE SUITE</h5>
                        <h6>Sleeps 2, Queen Bed</h6>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is text used in laying out print, graphic or web
                            designs. </p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms & Suites section end -->
    <!-- about covid sec start -->
    <section class="thmv-covid-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="thmv-about-covid">
                        <h2 class="thmv-br-mob-none">About <br>COVID-19</h2>
                        <p class="thmv-br-none">Aenean hendrerit maximus aliquet. <br>Pellentesque interdum odio dui, vitae
                            eleifend nibh aliquet ac. Vestibulum ante ipsum,</p>
                        <a class="read-more-btn" href="#">Read More <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="thmv-bg-dark thmv-rules-box h-100">
                        <div class="thmv-border-box h-100">
                            <h3 class="mb-3">Rules</h3>
                            <p>Pellentesque interdum odio dui, vitae eleifend nibh aliquet ac. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="thmv-promotions-box h-100">
                        <h3 class="mb-3">Promotions</h3>
                        <p>Pellentesque interdum odio dui, vitae eleifend nibh aliquet ac. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about covid sec start -->
    <!-- our service section start -->
    <section class="thmv-our-service">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="thmv-sec-title text-center">
                        <h2 class="thmv-title-effect-center text-uppercase">At Your Service</h2>
                    </div>
                    <div class="thmv-service-info w-50 w-md-75 mx-auto text-center">
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                            or web designs. </p>
                    </div>
                </div>
                <div class="row thmv-services col-lg-9 mx-auto">
                    <ul>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/fast-wiFi.svg') }}" alt="">
                                <p>Fast WiFi</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/bath.svg') }}" alt="">
                                <p>Bath</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/coffee.svg') }}" alt="">
                                <p>Coffee</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/safe.svg') }}" alt="">
                                <p>Safe</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/alarm.svg') }}" alt="">
                                <p>Alarm</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/fast-wiFi.svg') }}" alt="">
                                <p>Fast WiFi</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/bath.svg') }}" alt="">
                                <p>Bath</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/coffee.svg') }}" alt="">
                                <p>Coffee</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/safe.svg') }}" alt="">
                                <p>Safe</p>
                            </div>
                        </li>
                        <li>
                            <div class="thmv-services-box">
                                <img src="{{ asset('front/images/icons/alarm.svg') }}" alt="">
                                <p>Alarm</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row thmv-slick-img-slider">
            <div class="slick-image-center slider thmv-img-gray-hover">
                <div>
                    <img src="{{ asset('front/images/slider-img/slid-1.jpg') }}" alt="Slider image">
                    <div class="thmv-bg-glass text-center thmv-slider-service-box">
                        <h5>Included in the Room Rate</h5>
                        <p>International breakfast from 07 to 11</p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('front/images/slider-img/slid-2.jpg') }}" alt="Slider image">
                    <div class="thmv-bg-glass text-center thmv-slider-service-box">
                        <h5>Included in the Room Rate</h5>
                        <p>International breakfast from 07 to 11</p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('front/images/slider-img/slid-3.jpg') }}" alt="Slider image">
                    <div class="thmv-bg-glass text-center thmv-slider-service-box">
                        <h5>Included in the Room Rate</h5>
                        <p>International breakfast from 07 to 11</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <hr class="thmv-ser-separator">
            </div>
        </div>
    </section>
    <!-- our service section end -->
    <!-- What's nearby section start -->
    <section class="thmv-nearby">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-5 col-md-12 thmv-nearby-img">
                    <img src="{{ asset('front/images/whats-nearby.jpg') }}" alt="">
                </div>
                <div class="col-lg-7 col-md-12 ps-5 thmv-nearby-info">
                    <div class="thmv-sec-title text-left">
                        <h2 class="thmv-title-effect text-uppercase">What's nearby?</h2>
                    </div>
                    <div class="thmv-nearby-text text-left">
                        <p>The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph,
                            page, etc.) that doesn't distract from the layout. A practice not without controversy, laying
                            out pages with meaningless.</p>
                    </div>
                    <div class="thmv-nearby-us">
                        <ul>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/nature.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Nature - forest, lake</h6>
                                    <p>300 meters from the house</p>
                                </div>
                            </li>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/clothing-store.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Clothing store</h6>
                                    <p>300 meters from the house</p>
                                </div>
                            </li>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/mountain.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Mountain Attractions</h6>
                                    <p>300 meters from the house</p>
                                </div>
                            </li>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/helipad.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Helipad</h6>
                                    <p>300 meters from the house</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What's nearby section End -->
    <!-- review section start -->
    <section class="thmv-review-sec">
        <div class="container">
            <div class="row">
                <div class="thmv-sec-title text-center">
                    <h2 class="thmv-title-effect-center text-uppercase">Review</h2>
                </div>
                <div class="thmv-review-info w-50 mx-auto text-center">
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                        web designs.</p>
                </div>
            </div>
            <div class="row thmv-service">
                <div class="col-lg-4 col-md-6">
                    <div class="thmv-service-box">
                        <div class="thmv-rating">
                            <img src="{{ asset('front/images/brand-logo/tripadvisor.svg') }}" alt="">
                            <hr>
                            <ul class="d-flex justify-content-center">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p class="thmv-service-text">Take a deep dive and try our list of over 40 unique generators,
                                find placeholder images for your next design, or add a lorem ipsum plugin to the CMS or text
                                editor of your choice.</p>
                        </div>
                        <div class="thmv-user-info thmv-bg-dark text-center">
                            <h6>Marii Brown</h6>
                            <p>01/02/2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="thmv-service-box">
                        <div class="thmv-rating">
                            <img src="{{ asset('front/images/brand-logo/tripadvisor.svg') }}" alt="">
                            <hr>
                            <ul class="d-flex justify-content-center">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p class="thmv-service-text">Take a deep dive and try our list of over 40 unique generators,
                                find placeholder images for your next design, or add a lorem ipsum plugin to the CMS or text
                                editor of your choice.</p>
                        </div>
                        <div class="thmv-user-info thmv-bg-dark text-center">
                            <h6>Marii Brown</h6>
                            <p>01/02/2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-block d-lg-block d-md-none">
                    <div class="thmv-service-box">
                        <div class="thmv-rating">
                            <img src="{{ asset('front/images/brand-logo/tripadvisor.svg') }}" alt="">
                            <hr>
                            <ul class="d-flex justify-content-center">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p class="thmv-service-text">Take a deep dive and try our list of over 40 unique generators,
                                find placeholder images for your next design, or add a lorem ipsum plugin to the CMS or text
                                editor of your choice.</p>
                        </div>
                        <div class="thmv-user-info thmv-bg-dark text-center">
                            <h6>Marii Brown</h6>
                            <p>01/02/2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- review section end -->
    <!-- instagram feed section start -->
    <section class="thmv-instagram-feed thmv-bg-dark">
        <div class="container">
            <div class="row">
                <div class="thmv-sec-title text-center">
                    <h2 class="thmv-title-effect-light-center text-capitalize">#instagram</h2>
                </div>
                <div class="thmv-insta-feed-info w-50 mx-auto text-center">
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                        web designs.</p>
                </div>
            </div>
            <div class="row thmv-insta-feed-sec">
                <div class="col-lg-3 col-md-6 col-6 thmv-img-gray-hover">
                    <img src="{{ asset('front/images/instagram-feed/insta-feed-1.jpg') }}" alt="">
                </div>
                <div class="col-lg-3 col-md-6 col-6 thmv-img-gray-hover">
                    <img src="{{ asset('front/images/instagram-feed/insta-feed-2.jpg') }}" alt="">
                </div>
                <div class="col-lg-3 col-md-6 col-6 thmv-img-gray-hover">
                    <img src="{{ asset('front/images/instagram-feed/insta-feed-3.jpg') }}" alt="">
                </div>
                <div class="col-lg-3 col-md-6 col-6 thmv-img-gray-hover">
                    <img src="{{ asset('front/images/instagram-feed/insta-feed-4.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- instagram feed section end -->
@endsection
