@extends('front.app')

@section('content')
    <!-- Room page Header Start-->
    <div class="thmv-room-headv3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thmv-subpage-titlev3 text-center">
                        <h2>Detail Pembayaran</h2>
                        {{-- <p class="d-lg-none d-block m-0">So when is it okay to use lorem ipsum? <br>First, lorem ipsum works well for staging.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room page Header End-->

    <div class="container">
        <div class="row mb-5">
            <form class="row g-3 has-validation" method="POST" enctype="multipart/form-data"
                action="{{ route('pembayaran.process', $transaksi->id) }}">
                @csrf
                <div class="col-md-12 ">
                    <div class="card shadow " style=" border: 1px solid #000000;">

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <img style="height: 100%; width: 100%; object-fit: cover;" class="p-3"
                                        src="{{ Storage::url('uploads/kamar/' . $transaksi->kamar?->foto) }}"
                                        class="card-img-top img-thumbnail" alt="{{ $transaksi->kamar?->nomor_kamar }}"
                                        id="image_preview">
                                </div>
                                <div class="col-md-8">
                                    <table>
                                        <tr>
                                            <td width="150px">ID Transaksi</td>
                                            <td width="10px">:</td>
                                            <td>#{{ $transaksi->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Kamar</td>
                                            <td>:</td>
                                            <td>{{ $transaksi->kamar?->nomor_kamar }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Kamar</td>
                                            <td>:</td>
                                            <td>{{ $transaksi->kamar?->tipe?->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga Kamar</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($transaksi->kamar?->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Check In</td>
                                            <td>:</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($transaksi->check_in)->toFormattedDateString() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Check Out</td>
                                            <td>:</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($transaksi->check_out)->toFormattedDateString() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td>:</td>
                                            <td><b>Rp. {{ number_format($transaksi->total_pembayaran) }}</b></td>
                                        </tr>
                                    </table>
                                    <p>
                                        Silahkan lakukan pembayaran sebesar <b>Rp. {{ number_format($transaksi->total_pembayaran) }}</b> pada rekening dibawah ini untuk menyelesaikan transaksi. Jika sudah melakukan pembayaran, upload bukti pembayaran dibawah ini.<br>

                                    </p>
                                    <div class="card mt-3" style="border: 1px solid #000000;">
                                        <div class="card-body">
                                            <h5 class="card-title">Info Pembayaran</h5>
                                            <p class="card-text">Bank: {{ $transaksi->metodePembayaran->bank }}</p>
                                            <p class="card-text">No Rekening: {{ $transaksi->metodePembayaran?->no_rek }}</p>
                                            <p class="card-text">Atas Nama: {{ $transaksi->metodePembayaran?->nama_rek }}</p>
                                            </div>
                                    </div>
                                    <div class="card mt-3" style="border: 1px solid #000000;">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Upload Bukti Pembayaran</h5>
                                            <input type="file" name="bukti_pembayaran" class="form-control" required>
                                        </div>
                                    </div>
                                    <p><b>Perhatian:</b> Jika dalam waktu 1x24 jam tidak melakukan pembayaran, maka transaksi akan dibatalkan.</p>
                                    <div class="col-12">
                                        <button type="submit" class="btn-full-filled btn btn-primary w-100">Selesaikan Pembayaran</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
