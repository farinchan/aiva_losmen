@extends('front.app')

@section('content')
    <!-- Room page Header Start-->
    <div class="thmv-room-headv3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thmv-subpage-titlev3 text-center">
                        <h2>Pemesanan Saya</h2>
                        {{-- <p class="d-lg-none d-block m-0">So when is it okay to use lorem ipsum? <br>First, lorem ipsum works well for staging.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room page Header End-->

    <div class="container">
        <div class="row mb-5">
            @forelse ($transaksi as $transaksi)
                <div class="col-md-12 mb-3">
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
                                            <td>{{ Carbon\Carbon::parse($transaksi->tanggal_check_in)->format('d F Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lama Menginap</td>
                                            <td>:</td>
                                            <td>{{ $transaksi->total_hari }} Malam</td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($transaksi->total_pembayaran) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Kamar</td>
                                            <td>:</td>
                                            <td>
                                                @if ($transaksi->status == 'selesaikan pembayaran')
                                                    <span class="badge bg-warning">{{ $transaksi->status }}</span>
                                                @elseif ($transaksi->status == 'reservasi')
                                                    <span class="badge bg-primary">{{ $transaksi->status }}</span>
                                                @elseif ($transaksi->status == 'digunakan')
                                                    <span class="badge bg-info">{{ $transaksi->status }}</span>
                                                @elseif ($transaksi->status == 'selesai')
                                                    <span class="badge bg-success">{{ $transaksi->status }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-warning text-dark">{{ $transaksi->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    @if ($transaksi->status == 'selesaikan pembayaran')
                                        <p>
                                            Silahkan lakukan pembayaran sebesar <b>Rp.
                                                {{ number_format($transaksi->total_pembayaran) }}</b> dengan mengklik
                                            tombol dibawah ini.
                                        </p>
                                        <p>

                                            <a href="{{ route('pembayaran', $transaksi->id) }}">
                                                <i class="fas fa-credit-card"></i>&nbsp;
                                                Bayar Sekarang!
                                            </a>
                                            &nbsp; | &nbsp;
                                            <a href="{{ route('transaksi.cancel', $transaksi->id) }}"
                                                onclick="return confirm('Apakah anda yakin ingin membatalkan transaksi ini?')">
                                                <i class="fas fa-times"></i>&nbsp;
                                                Batalkan pemesanan
                                            </a>
                                        </p>
                                    @elseif ($transaksi->status !== 'dibatalkan')
                                        <a href="{{ route('transaksi.receipt', $transaksi->id) }}">
                                            <i class="fas fa-receipt"></i>&nbsp;
                                            Cetak Invoice
                                        </a>
                                    @endif


                                </div>
                                @if ($transaksi->status == 'selesaikan pembayaran')

                                <div class="col-md-12 mt-3">
                                    <div class="card mt-3" style="border: 1px solid #000000;">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">History Pembayaran</h5>
                                            <table style="width: 100%;" class="table table-bordered">
                                                <thead>
                                                    <th>ID Pembayaran</th>
                                                    <th>Tanggal Transfer</th>
                                                    <th>Status</th>
                                                    <th>Bukti Pembayaran</th>
                                                </thead>
                                                @foreach ($transaksi->konfirmasiPembayaran as $pembayaran)
                                                    <tr>
                                                        <td># {{ $pembayaran->id }}</td>
                                                        <td>{{ $pembayaran->tanggal_transfer }}</td>
                                                        <td>
                                                            @if ($pembayaran->status == 'Menunggu Konfirmasi')
                                                                <span
                                                                    class="badge bg-warning text-dark">{{ $pembayaran->status }}</span>
                                                            @elseif ($pembayaran->status == 'Diterima')
                                                                <span
                                                                    class="badge bg-success">{{ $pembayaran->status }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-danger">{{ $pembayaran->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ Storage::url($pembayaran->bukti_transfer) }}"
                                                                target="_blank"> <i class="fas fa-file-image"></i> Lihat
                                                                Bukti</a> <br>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12" style="height: 300px">
                    <p class="text text-center">Belum ada transaksi</p>

                </div>
            @endforelse

        </div>
    </div>
@endsection

@section('scripts')
@endsection
