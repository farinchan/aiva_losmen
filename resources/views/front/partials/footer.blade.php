    <!-- Footer section start -->
    <section class="thmv-footer">
        <div class="container-fluid">
            <div class="row thmv-footer-sec">
                <div class="container">
                    <div class="row align-items-top">
                        <div class="col-lg-4 thmv-about">
                            <h6>Tentang Kami</h6>
                            <p>Aiva Losmen Menjadi tempat penginapan yang menawarkan kenyamanan dan keamanan bagi para
                                tamu yang menginap. Dengan harga yang terjangkau dan fasilitas yang lengkap</p>
                        </div>
                        <div class="col-lg-6 thmv-footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Kamar</a></li>
                                <li><a href="#">Tentang kami</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">hubungi Kami</a></li>
                                <li><a href="#">Pesanan saya</a></li>
                                <li><a href="#">Profile Saya</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 thmv-footer-social">
                            <h6>Get Social</h6>
                            <ul class="thmv-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="#" class="btn-outline">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row thmv-bg-dark">
                <div class="container">
                    <div class="row thmv-bottom-footer ">
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center text-md-start thmv-footer-bottom-menu">
                            <a href="#">Development By : </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center thmv-copyright">
                            <a href="#">
                                © 2024 Aiva Losmen. All Rights Reserved.
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center text-md-end">
                            <ul class="d-flex thmv-payment justify-content-center justify-content-md-end">
                                <li>
                                    <a href=""><i class="fab fa-cc-visa"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fab fa-cc-mastercard"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer section End -->
    <!-- Booknow header button Modal -->
    <div class="modal fade book_popup" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal_form_title">
                        <h4>Booking</h4>
                    </div>
                    <form class="thmv-search-form-tour" action="{{ route('kamar') }}">
                        <div class="thmv-field-search">
                            <div class="row thmv-mo-tour-row justify-content-center">
                                <div class="col-lg-12 col-md-12 thmv-mo-date-col">
                                    <div class="thmv-mo-check-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control check-in-out"
                                                id="popupDatepickerfrom1Modal" placeholder="Tanggal Check-in"
                                                name="check_in">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control check-in-out"
                                                id="popupDatepickerto1Modal" placeholder="Tanggal Check-out"
                                                name="check_out">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-select" name="tipe"
                                                style="background-color: transparent; color: #fff; border: 1px solid #333333; border-radius: 0px; padding: 10px; width: 100%; margin-bottom: 20px;">
                                                <option style="color: #333333" value="">Semua</option>
                                                @foreach ($tipe_kamar as $tipe)
                                                    <option style="color: #333333"
                                                        @if (request()->get('tipe') == $tipe->id) selected @endif
                                                        value="{{ $tipe->id }}">{{ $tipe->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="thmv-promo-box">
                                        <div class="form-group">
                                            <button class="thmv-tour-search btn_mo_search" type="submit">Cari
                                                Kamar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Right side floting buttons -->
    <div class="thmv-home-side thmv-home-floting-btn">
        <a href="" id="home-top" class="thmv-backto-top-sticky">
            <i class="fas fa-chevron-up"></i>Go to top
        </a>
        <button type="button" class="thmv-calendar-sticky" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="fas fa-calendar-day"></i></button>
        <a href="" class="thmv-messenger-sticky" title="Perlu Bantuan?">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
