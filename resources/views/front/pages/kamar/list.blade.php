@extends('front.app')
@section('content')
    <!-- Room page Header Start-->
    <div class="thmv-room-headv2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thmv-subpage-titlev2">
                        <h2 class="text-uppercase">Rooms</h2>
                        <p>So when is it okay to use lorem ipsum? First, <br>lorem ipsum works well for staging.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room page Header End-->

    <!-- Room Listing Start -->
    <div class="thmv-room-listv2-sec thmv-room-card">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    @foreach ($kamar as $data)
                        <div class="row thmv-list-box">
                            <div class="col-md-6 col-12">
                                <div class="thmv-listimg">
                                    <img class="img-fluid" src="{{ Storage::url('uploads/kamar/' . $data->foto) }}"
                                        alt="">
                                    <div class="thmv-listimg-from">
                                        <h4 class="thmv-bg-glass">@money($data->harga)</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 position-relative">
                                <div class="thmv-listroom-info">
                                    @if ($data->ulasan->avg('rating') >= 4)
                                        <div class="thmv-listimg-top">
                                            <h5>Top</h5>
                                        </div>
                                    @endif

                                    <h5>{{ $data->tipe->nama }} - No. {{ $data->nomor_kamar }}</h5>
                                </div>
                                <div class="thmv-listroom-detail">
                                    <p class="thmv-queenbed"> ⭐ {{ round($data->ulasan->avg('rating'), 1) }}/5, kapasitas
                                        {{ $data->kapasitas }} Orang </p>
                                    <p>
                                        {{ Str::limit(strip_tags($data->deskripsi), 200) }}
                                    </p>
                                    <a class="read-more-btn me-3" href="{{ route("kamar.detail", $data->id) }}">
                                        Lihat
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="read-more-btn" href="#">
                                        Pesan Sekarang
                                        <i class="fas fa-ticket-alt"></i>
                                    </a>
                                </div>
                                <div class="thmv-card-listing-service">
                                    <ul class="thmv-listroom-servicec d-flex">
                                        <li><img src="assets/images/icons/fast-wiFi.svg" alt=""></li>
                                        <li><img src="assets/images/icons/bath.svg" alt=""></li>
                                        <li><img src="assets/images/icons/coffee.svg" alt=""></li>
                                        <li><img src="assets/images/icons/safe.svg" alt=""></li>
                                        <li><img src="assets/images/icons/alarm.svg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="thmv-room-pagination">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center justify-content-lg-start">
                                @if ($kamar->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Sebelumnya</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ route('kamar', ['page' => $kamar->currentPage() - 1, 'tipe' => request()->tipe]) }}">Sebelumnya</a>
                                    </li>
                                @endif

                                @php
                                    // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                    $start = max($kamar->currentPage() - 2, 1);
                                    $end = min($start + 4, $kamar->lastPage());
                                @endphp

                                @if ($start > 1)
                                    <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                    <li>
                                        <a>...</a>
                                    </li>
                                @endif

                                @foreach ($kamar->getUrlRange($start, $end) as $page => $url)
                                    @if ($page == $kamar->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link">
                                                {{ $page }}
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ route('kamar', ['page' => $page, 'tipe' => request()->tipe]) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($end < $kamar->lastPage())
                                    <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                    <li>
                                        <a>...</a>
                                    </li>
                                @endif

                                @if ($kamar->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ route('kamar', ['page' => $kamar->currentPage() + 1, 'tipe' => request()->tipe]) }}">Selanjutnya</a>
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
                <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                    <!-- Check Availability Form Start -->
                    <div class="thmv-checkavai-form mt-0 thmv-checkavai-formv2">
                        <div class="thmv-form-availability">
                            <h5>Cek Ketersediaan</h5>
                        </div>
                        <form class="thmv-availability-check">
                            <div class="thmv-mo-check-form">
                                <div class="form-group">
                                    <input type="text" class="form-control check-in-out" id="popupDatepickerfrom1"
                                        placeholder="Tanggal Check-in" name="dates">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control check-in-out" id="popupDatepickerto1"
                                        placeholder="Tanggal Check-out" name="dates">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </div>
                            <div class="dropdown form-select-guests thmv-mo-guest-col">
                                <div class="form-group">
                                    <select
                                        style="border: 1px solid #e5e5e5; border-radius: 0px; height: 45px; font-size: 14px"
                                        name="tipe" class="form-control mb-3" id="tipe">
                                        <option value="">Pilih Tipe Kamar</option>
                                        @foreach ($list_tipe as $item)
                                            <option value="{{ $item->id }}"
                                                @if (request()->tipe == $item->id) selected @endif>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="thmv-tour-search btn-full-filled" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Check Availability Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Room Listing End -->
@endsection
