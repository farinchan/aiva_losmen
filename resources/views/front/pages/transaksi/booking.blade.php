@extends('front.app')

@section('content')
    <!-- Room page Header Start-->
    <div class="thmv-room-headv3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thmv-subpage-titlev3 text-center">
                        <h2>Booking Kamar</h2>
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
                action="{{ route('booking.process', $kamar->id) }}">
                @csrf

                <div class="col-md-8 ">
                    <div style="border: 1px solid #000000;" class="card mb-3">
                        {{-- <div style="border-bottom: 1px solid #000000;" class="card-header">
                            Informasi Kamar
                        </div> --}}
                        <div class="card-body thmv-contact-form shadow">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <img class="img-fluid" src="{{ Storage::url('uploads/kamar/' . $kamar->foto) }}"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title ">{{ $kamar->tipe->nama }} - No. {{ $kamar->nomor_kamar }}
                                    </h5>
                                    <p class="card-text">Harga: <br>
                                        @money($kamar->harga) / malam
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div style="border: 1px solid #000000;" class="card mb-3">
                        {{-- <div style="border-bottom: 1px solid #000000;" class="card-header">
                            Schedule Booking
                        </div> --}}
                        <div class="card-body thmv-contact-form shadow ">
                            <div class="form-group mb-3">
                                <label for="checkin_field">Tanggal Check In</label>
                                <input style="border: 1px solid #000000;" required="" type="date" name="check_in"
                                    class="form-control @if ($errors->has('check_in')) is-invalid @endif"
                                    value="{{ old('check_in') }}" id="checkin_field" placeholder="*Tanggal Check In" readonly>
                                @error('check_in')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="checkout_field">Tanggal Check Out</label>
                                <input style="border: 1px solid #000000;" required="" type="date" name="check_out"
                                    class="form-control @if ($errors->has('check_out')) is-invalid @endif"
                                    value="{{ old('check_out') }}" id="checkout_field" placeholder="*Tanggal Check Out" readonly>
                                @error('check_out')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="durasiHari">Durasi</label>
                                <div class="input-group ">
                                    <input style="border: 1px solid #000000;" required="" type="number"
                                        name="durasiHari"
                                        class="form-control @if ($errors->has('durasiHari')) is-invalid @endif"
                                        value="{{ old('durasiHari') }}" id="durasiHari" placeholder="*Durasi Hari" readonly
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Hari</span>
                                    </div>
                                </div>
                                @error('durasiHari')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div style="border: 1px solid #000000;" class="card  mb-3">
                        {{-- <div style="border-bottom: 1px solid #000000;" class="card-header">
                            Metode Pembayaran
                        </div> --}}
                        <div class="card-body thmv-contact-form shadow ">
                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran <span class="text-danger">*</span></label>
                                <select style="border: 1px solid #000000;" name="metode_pembayaran_id" id="metode_pembayaran"
                                    class="form-control @if ($errors->has('metode_pembayaran')) is-invalid @endif">
                                    <option selected disabled>*Pilih Metode Pembayaran</option>
                                    @foreach ($list_metode_pembayaran as $metode_pembayaran)
                                        <option value="{{ $metode_pembayaran->id }}"
                                            @if (old('metode_pembayaran') == $metode_pembayaran->id) selected @endif>
                                            {{ $metode_pembayaran->bank }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('metode_pembayaran')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12" id="info_metode_pembauaran">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card shadow " style=" border: 1px solid #000000;">
                        {{-- <div style="border-bottom: 1px solid #000000;" class="card-header">
                            Tagihan
                        </div> --}}

                        <div class="card-body">
                            <h5 class="card-title ">Tagihan</h5>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">Harga Kamar</p>
                                <p class="card-text">@money($kamar->harga)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">Durasi Hari</p>
                                <p class="card-text" id="durasiHariTagihan"></p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">Total</p>
                                <p class="card-text" id="totalTagihan"></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex  mt-3 align-items-center justify-content-center">
                        <button type="submit" style="width:100%
                            " class="btn-full-filled btn btn-primary">Booking & Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var kamar = @json($kamar);
        var urlParams = new URLSearchParams(window.location.search);

        var check_in = @json($check_in);
        var check_out = @json($check_out);

        $('#checkin_field').val(check_in);
        $('#checkout_field').val(check_out);

        var checkinDate = new Date(check_in);
        var checkoutDate = new Date(check_out);

        var diffTime = Math.abs(checkoutDate - checkinDate);
        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        $('#durasiHari').val(diffDays);

        var list_metode_pembayaran = @json($list_metode_pembayaran);
        $('#metode_pembayaran').change(function() {
            var metode_pembayaran_id = $(this).val();
            var metode_pembayaran = list_metode_pembayaran.find(x => x.id == metode_pembayaran_id);
            var info_metode_pembauaran = `
                <div class="card mt-3" style="border: 1px solid #000000;">
                    <div class="card-body">
                        <h5 class="card-title">Info Pembayaran</h5>
                        <p class="card-text">Bank: ${metode_pembayaran.bank}</p>
                        <p class="card-text">No Rekening: ${metode_pembayaran.no_rek}</p>
                        <p class="card-text">Atas Nama: ${metode_pembayaran.nama_rek}</p>
                        </div>
                </div>
            `;
            $('#info_metode_pembauaran').html(info_metode_pembauaran);
        });

        $('#durasiHariTagihan').text(diffDays + ' Hari');
        $('#totalTagihan').text('Rp. ' + (diffDays * kamar.harga).toLocaleString('id-ID'));
    </script>
@endsection
