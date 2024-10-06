@extends('front.app')
@section('content')
    <!-- Room page Header Start-->
    <div class="thmv-header-room-single-v2 container-fluid">
        <div class="row px-0">
            <div class="thmv-header-img px-0">
                <img src="{{ Storage::url('uploads/kamar/' . $kamar->foto) }}" alt="Slider image">
            </div>
        </div>
    </div>
    <!-- Room page Header End-->

    <!-- Room Listing Start -->
    <section class="thmv-room-single thmv-room-single-modern">
        <div class="container">
            <div class="row">
                <div class="col-md-12 thmv-room-details">
                    <div class="thmv-Signature-title thmv-Signature-v2">
                        <div>
                            <p>
                                <i class="fas fa-star"></i> <strong>{{ round($kamar->ulasan->avg('rating'), 2) }}</strong>
                                ({{ $kamar->ulasan->count() }}) <i class="fas fa-circle"></i>
                                @if ($kamar->ulasan->avg('rating') >= 4.5)
                                    Excellent
                                @elseif ($kamar->ulasan->avg('rating') >= 4)
                                    Sangat Populer
                                @elseif ($kamar->ulasan->avg('rating') >= 3.5)
                                    Populer
                                @elseif ($kamar->ulasan->avg('rating') >= 3)
                                    Bagus
                                @else
                                    Cukup Bagus
                                @endif
                            </p>
                            <h2>{{ $kamar->tipe->nama }} - No. {{ $kamar->nomor_kamar }}</h2>
                        </div>
                        <div class="thmv-room-details-price">
                            <h5>Mulai: @money($kamar->harga) <span class="d-block d-md-none d-lg-inline"> / Malam</span></h5>
                        </div>
                    </div>
                    <hr class="thmv-separate">
                    <div class="thmv-single-services thmv-nearby-us">
                        <ul>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/entire-home.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Entire home</h6>
                                    <p>All for your needs.</p>
                                </div>
                            </li>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/guests.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>{{ $kamar->kapasitas }} Tamu</h6>
                                    <p>
                                        Kapasitas sampai {{ $kamar->kapasitas }} Tamu
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/sofa.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Tempat Tidur</h6>
                                    <p>
                                        Tempat tidur yang nyaman
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="thmv-nearby-icon">
                                    <img src="{{ asset('front/images/icons/calendar.svg') }}" alt="">
                                </div>
                                <div class="thmv-nearby-places">
                                    <h6>Cancel Kapan saja</h6>
                                    <p>
                                        Dapat dibatalkan kapan saja
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="thmv-separate d-none d-md-block d-lg-none">
                    <div class="row thmv-single-about">
                        <div class="col-lg-8">
                            <h5 class="text-capitalize">Tentang Kamar Ini</h5>
                            <div class="thmv-paragraph">
                                <p>
                                    {!! $kamar->deskripsi !!}
                                </p>
                            </div>
                            <div class="thmv-amenities-services thmv-about-list row">
                                <div class="thmv-amenities-col col-md-12">
                                    <div class="thmv-single-services thmv-nearby-us">
                                        <ul>
                                            @foreach ($kamar->fasilitasKamar as $fasil)
                                                <li>
                                                    <div class="thmv-nearby-icon">
                                                        <img width="30px"
                                                            src="{{ Storage::url('uploads/fasilitas/' . $fasil->fasilitas->icon) }}"
                                                            alt="{{ $fasil->fasilitas->nama }}">
                                                    </div>
                                                    <div class="thmv-nearby-places">
                                                        <p>{{ $fasil->fasilitas->nama }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="thmv-separate">
                            <div class="thmv-reviews-sec">
                                <h5>Ulasan</h5>
                                <div class="row thmv-review-row align-items-center" id="ulasanCuy">
                                    <div class="col-md-3 col-12 thmv-rating-col">
                                        <div class="thmv-all-rating">
                                            <div class="thmv-rating-title d-flex align-items-center"><i
                                                    class="fas fa-star"></i>
                                                <h2>{{ round($kamar->ulasan->avg('rating'), 2) }}</h2>
                                            </div>
                                            <p class="thmv-p-light">
                                                Dari {{ $kamar->ulasan->count() }} ulasan yang ada
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12 thmv-progress-sec">
                                        <ul>
                                            <li>
                                                <div class="thmv-progtess-info">
                                                    <h6>Positif</h6>
                                                    <p class="thmv-p-light">4 Bintang dan diatasnya</p>
                                                </div>
                                                <div class="thmv-progress">
                                                    <h5>{{ $ulasan_positif_percentage }} %</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $ulasan_positif_percentage }}%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thmv-progtess-info">
                                                    <h6>Netral</h6>
                                                    <p class="thmv-p-light">
                                                        Antara 2 - 4 Bintang
                                                    </p>
                                                </div>
                                                <div class="thmv-progress">
                                                    <h5>{{ $ulasan_netral_percentage }} %</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $ulasan_netral_percentage }}%"
                                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thmv-progtess-info">
                                                    <h6>Negatif</h6>
                                                    <p class="thmv-p-light mb-0">
                                                        dibawah 2 Bintang

                                                    </p>
                                                </div>
                                                <div class="thmv-progress">
                                                    <h5>{{ $ulasan_negatif_percentage }} %</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $ulasan_negatif_percentage }}%"
                                                            aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="thmv-user-review">
                                    @foreach ($ulasan_pagination as $ulasan)
                                        <div class="thmv-review-box">
                                            <div class="thmv-user-title">
                                                <h6>{{ $ulasan->judul }}</h6>
                                                <p class="mb-0"><i class="fas fa-star"></i> <strong>{{ $ulasan->rating }}
                                                        / 5</strong>
                                                </p>
                                            </div>
                                            <div class="thmv-user-text">
                                                <p class="thmv-p-light">{{ $ulasan->komentar }}</p>
                                            </div>
                                            <div class="thmv-user-data">
                                                <div class="thmv-user-img">
                                                    <img class="rounded-circle" src="{{ $ulasan->pelanggan?->getFoto() }}"
                                                        alt="">
                                                </div>
                                                <div class="thmv-user-name">
                                                    <h6>{{ $ulasan->pelanggan?->nama }}</h6>
                                                    <p class="thmv-p-light m-0">{{ $ulasan->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="thmv-room-pagination">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-center justify-content-lg-start">
                                        @if ($ulasan_pagination->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#">Sebelumnya</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $ulasan_pagination->previousPageUrl() }}#ulasanCuy">Sebelumnya</a>
                                            </li>
                                        @endif

                                        @php
                                            // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                            $start = max($ulasan_pagination->currentPage() - 2, 1);
                                            $end = min($start + 4, $ulasan_pagination->lastPage());
                                        @endphp

                                        @if ($start > 1)
                                            <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                            <li>
                                                <a>...</a>
                                            </li>
                                        @endif

                                        @foreach ($ulasan_pagination->getUrlRange($start, $end) as $page => $url)
                                            @if ($page == $ulasan_pagination->currentPage())
                                                <li class="page-item active">
                                                    <span class="page-link">
                                                        {{ $page }}
                                                        <span class="sr-only">(current)</span>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item"><a class="page-link"
                                                        href="{{ $url }}#ulasanCuy">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        @if ($end < $ulasan_pagination->lastPage())
                                            <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                            <li>
                                                <a>...</a>
                                            </li>
                                        @endif

                                        @if ($ulasan_pagination->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $ulasan_pagination->nextPageUrl() }}#ulasanCuy">Selanjutnya</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#">Selanjutnya</a>
                                            </li>
                                        @endif



                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 thmv-side-bar">
                            <!-- Check Availability Form Start -->
                            <div class="thmv-side-bar-sticky ps-3">
                                <div class="mt-0 thmv-checkavai-form">
                                    <div class="thmv-form-availability">
                                        <h5 style="font-size: 18px">Reservasi Kamar</h5>
                                    </div>
                                    <form class="thmv-availability-check" action="{{ route('front.booking') }}"
                                        <div class="thmv-mo-check-form">
                                            <div class="form-group">
                                                <input type="text" class="form-control check-in-out"
                                                    id="popupDatepickerfrom1" placeholder="Tanggal Check-in"
                                                    name="check_in" value="{{ request()->check_in }}" autocomplete="off"
                                                    required>
                                                <i class="fas fa-calendar-day"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control check-in-out"
                                                    id="popupDatepickerto1" placeholder="Tanggal Check-out"
                                                    name="check_out" value="{{ request()->check_out }}"
                                                    autocomplete="off" required>
                                                <i class="fas fa-calendar-day"></i>
                                            </div>
                                        </div>
                                        {{-- <div class="thmv-extra-services">
                                            <h5 style="font-size: 16px">Pelayanan Ekstra</h5>
                                            <ul class="thmv-extra-services-list">
                                                <li>
                                                    <div class="thmv-services-checkbox">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="flexCheckDefault-3">
                                                            <label class="form-check-label" for="flexCheckDefault-3">
                                                                Desert
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="thmv-services-price">
                                                        <h6>Rp. 40.000/potong</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                            <hr class="thmv-separate">
                                            <div class="thmv-your-price">
                                                <h5 style="font-size: 14px">Total Harga:</h5>
                                                <h5 style="font-size: 14px" id="totalHarga">Rp. 0</h5>
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <button class="thmv-tour-search btn-full-filled" type="submit"
                                                id="btnBooking">Booking
                                                sekarang</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Check Availability Form End -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Room Listing End -->
@endsection

@section('scripts')
    <script>
        var kamar = @json($kamar);
        console.log("Harga Kamar :", kamar.harga);


        var check_in = ""
        var check_out = ""


        setInterval(() => {
            check_in = $('#popupDatepickerfrom1').val()
            check_out = $('#popupDatepickerto1').val()
            checkDate()
        }, 500);

        function checkDate() {
            if (check_in == "" || check_out == "") {
                console.log("Tanggal Check In dan Check Out harus diisi");
                $('#totalHarga').text("Rp. 0")
            } else {
                var checkinDate = new Date(check_in);
                var checkoutDate = new Date(check_out);

                var timeDiff = Math.abs(checkoutDate.getTime() - checkinDate.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                console.log("Selisih Hari :", diffDays);

                if (diffDays == 0) {
                    diffDays = 1
                }
                var totalHarga = diffDays * kamar.harga
                console.log("Total Harga :", totalHarga);
                $('#totalHarga').text("Rp. " + new Intl.NumberFormat('id-ID').format(totalHarga))
            }
        }

        $('btnBooking').click(function(e) {
            e.preventDefault()
            console.log("Booking Sekarang");
        })
    </script>
@endsection
