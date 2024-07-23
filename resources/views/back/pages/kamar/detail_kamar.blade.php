@extends('back/app')
@section('styles')
@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div
                            class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            <img class="mw-150px mw-lg-180px"
                                src="@if ($kamar->foto) {{ Storage::url('uploads/kamar/' . $kamar->foto) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $kamar->nomor_kamar }} @endif"
                                alt="image" />
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="#"
                                            class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">No : {{ $kamar->nomor_kamar }} - {{ $kamar->tipe->nama }}</a>
                                        
                                    </div>
                                    <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                        
                                        {{ Str::limit(strip_tags($kamar->deskripsi), 70);  }}
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <a href="{{ route('back.kamar.edit', $kamar->id) }}"
                                        class="btn btn-sm btn-primary me-3">Edit Produk</a>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <div class="d-flex flex-wrap">
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold">@money($kamar->harga)</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Harga/malam</div>
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold" data-kt-countup="true"
                                                data-kt-countup-value="{{ $kamar->kapasitas }}">0
                                            </div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Kapasitas</div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                 
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6 active"
                                    href="{{ route("back.kamar.detail", $kamar->id) }}">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6"
                                    href="{{ route("back.kamar.ulasan", $kamar->id) }}">Ulasan</a>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title fs-3 fw-bold">Detail Produk</div>
                </div>
                <div class="card-body p-9">
                    {{-- <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Gambar Produk</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div
                                    class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                    <img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg"
                                        alt="image" />
                                </div>
                                <div
                                    class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                    <img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg"
                                        alt="image" />
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Nomor Kamar</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $kamar->nomor_kamar }}</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Tipe Kamar</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $kamar->tipe->nama }}</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">kapasitas</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{{ $kamar->kapasitas }}</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Harga kamar/malam</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">@money($kamar->harga)</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Deskripsi</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="fs-6 fw-semibold mt-2 mb-3">{!! $kamar->deskripsi !!}</div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-semibold mt-2 mb-3">Fasilitas</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-5">
                                @foreach ($kamar->fasilitasKamar as $fasil)
                                    <div class="col">
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 active" >
                                            <span
                                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1 me-5 active">
                                               
                                            </span>
                                            <img class="w-35px me-1"
                                                src="@if ($fasil->fasilitas->icon) {{ Storage::url('uploads/fasilitas/' . $fasil->fasilitas->icon) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $fasil->fasilitas->name }} @endif"
                                                alt="">
                                            <span class="ms-5">
                                                <span
                                                    class="fs-4 fw-bold text-gray-800 d-block">{{ $fasil->fasilitas->nama }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
