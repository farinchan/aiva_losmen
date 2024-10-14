@extends('back/app')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">

            <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-3">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                        style="background-color: #F1416C;background-image:url('/metronic8/demo1/assets/media/svg/shapes/wave-bg-red.svg')">
                        <div class="card-header pt-5 mb-3">
                            <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                                <i class="ki-duotone ki-call text-white fs-2qx lh-0"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span><span class="path6"></span><span class="path7"></span><span
                                        class="path8"></span></i>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">{{ $transaksi_hari_ini }}</span>
                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Jumlah Pemesanan</span>
                                    <span class="">Hari Ini</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"
                            style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <div class="fw-bold text-white py-2">
                                <span class="fs-1 d-block">{{ $total_transaksi }}</span>
                                <span class="opacity-50">Total Semua Pemesanan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                        style="background-color: #7239EA;background-image:url('/metronic8/demo1/assets/media/svg/shapes/wave-bg-purple.svg')">
                        <div class="card-header pt-5 mb-3">
                            <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                                <i class="ki-duotone ki-dollar text-white fs-2qx lh-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-end mb-3">
                            <div class="d-flex align-items-center">
                                <span class="fs-3hx text-white fw-bold me-6">@money($pendapatan_hari_ini)</span>
                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Jumlah Pendapatan</span>
                                    <span class="">Hari Ini</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"
                            style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <div class="fw-bold text-white py-2">
                                <span class="fs-2 d-block">@money($total_pendapatan)</span>
                                <span class="opacity-50">Total Semua pendapatan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="card h-md-100" dir="ltr">
                        <div class="card-body d-flex flex-column flex-center">
                            <div class="mb-2">
                                <h1 class="fw-semibold text-gray-800 text-center lh-lg">
                                    Halo Admin 👋<br>
                                    <span class="fw-bolder">{{ Auth::user()->pegawai?->nama }}</span>
                                </h1>
                                <div class="py-10 text-center">
                                    <img src="{{ asset('back/media/svg/illustrations/easy/1.svg') }}"
                                        class="theme-light-show w-200px" alt="">
                                    <img src="{{ asset('back/media/svg/illustrations/easy/1-dark.svg') }}"
                                        class="theme-dark-show w-200px" alt="">
                                </div>
                            </div>
                            <div class="text-center mb-1">
                                <p>
                                    Selamat datang di halaman admin Aiva Losmen <br>
                                    Dashboard ini adalah tempat untuk melihat data dan statistik dari manajemen Aiva Losmen
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-12">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Statistik Pendapatan harian sebulan
                                    terakhir</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0 px-0">
                            {{-- INI TEMPAT STAT NYA --}}
                            <div id="chart_1" class="px-5"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                <div class="col-sm-3 col-xl-2 mb-7">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-compass fs-2hx text-gray-600">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_reservasi }}</span>
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-500">Total Reservasi </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xl-2 mb-7">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-brifecase-tick fs-2hx text-gray-600">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>

                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_digunakan }}</span>
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-500">Total Check-In</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xl-2 mb-7">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-brifecase-cros fs-2hx text-gray-600">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_selesai }}</span>
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-500">Total Check-Out</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xl-2 mb-7">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-cross-square fs-2hx text-gray-600">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>

                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_dibatalkan }}</span>
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-500">Total Dibatalkan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xl-2 mb-7">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-note fs-2hx text-gray-600">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_kamar }}</span>
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-500">Total Kamar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xl-2 mb-7">
                    <div class="card h-lg-100">
                        <div class="card-body d-flex justify-content-between align-items-start flex-column">
                            <div class="m-0">
                                <i class="ki-duotone ki-star fs-2hx text-gray-600"></i>
                            </div>
                            <div class="d-flex flex-column my-7">
                                <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_ulasan }}</span>
                                <div class="m-0">
                                    <span class="fw-semibold fs-6 text-gray-500">Total Ulasan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Fungsi untuk format Rupiah
        function formatRupiah(angka) {
            var numberString = angka.toString(),
                sisa = numberString.length % 3,
                rupiah = numberString.substr(0, sisa),
                ribuan = numberString.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return 'Rp ' + rupiah;
        }
        var chart_1 = new ApexCharts(document.querySelector("#chart_1"), {
            series: [{
                name: 'Pendapatan',
                data: []
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return formatRupiah(val); // Format label data menjadi Rupiah
                }
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Pendapatan Harian (Sebulan Terakhir)',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: [],
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return formatRupiah(value); // Format label y-axis menjadi Rupiah
                    }
                }
            }
        });
        chart_1.render();
        $.ajax({
            url: "{{ route('back.dashboard.statistik') }}",
            type: "GET",
            success: function(response) {
                console.log(response);
                chart_1.updateSeries([{
                    name: 'Pendapatan',
                    data: response.pendapatan_sebulan_terakhir.map(function(item) {
                        return item.total; // Data pendapatan per hari
                    })
                }]);
                chart_1.updateOptions({
                    xaxis: {
                        categories: response.pendapatan_sebulan_terakhir.map(function(item) {
                            return item.date; // Tanggal pendapatan
                        })
                    }
                });
            },
            error: function(error) {
                console.error("Error fetching data: ", error);
            }
        });
    </script>
@endsection
