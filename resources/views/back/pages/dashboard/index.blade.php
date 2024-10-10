@extends('back/app')
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">

                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_reservasi }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Reservasi </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_digunakan }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Check-In</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_selesai }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Check-Out</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_dibatalkan }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Dibatalkan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_pelanggan }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Pelanggan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_pegawai }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Pegawai</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_kamar }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Kamar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-7">
                            <div class="card h-lg-100">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $jumlah_ulasan }}</span>
                                        <div class="m-0">
                                            <span class="fw-semibold fs-6 text-gray-500">Total Ulasan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
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
