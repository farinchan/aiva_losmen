@extends('front.app')

@section('content')
    <!-- Room page Header Start-->
    <div class="thmv-room-headv3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thmv-subpage-titlev3 text-center">
                        <h2>Profil Saya</h2>
                        {{-- <p class="d-lg-none d-block m-0">So when is it okay to use lorem ipsum? <br>First, lorem ipsum works well for staging.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room page Header End-->

    <div class="container">
        <div class="row mb-5">
            <form class="row g-3 has-validation" method="POST" enctype="multipart/form-data" action="{{ route("profile.update") }}">
                @method('PUT')
                @csrf
                <div class="col-md-4 mt-5">
                    <div class="card shadow " style="width: 21rem; border: 1px solid #000000;">
                        <div style="border-bottom: 1px solid #000000;" class="card-header">
                            Foto Profile
                        </div>
                        <img class="p-3"
                            src="{{ $user->pelanggan?->getFoto()}}"
                            class="card-img-top img-thumbnail" alt="{{ $user->pelanggan?->nama }}" id="image_preview">
                        <input type="file" id="image" name="foto" class="d-none" accept="image/*">

                        <div class="card-body">
                            <a href="#" class="card-link" id="chage_image">Ganti Foto</a>
                            <a href="#" class="card-link">hapus Foto</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-5">
                    <div style="border: 1px solid #000000;" class="card">
                        <div style="border-bottom: 1px solid #000000;" class="card-header">
                            Biodata
                        </div>
                        <div class="card-body thmv-contact-form shadow">
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Nama Lengkap</label>
                                <input style="border: 1px solid #000000; padding: 10px"  name="name" required="" type="text"
                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    placeholder="*Nama Lengkap" value="{{ $user->pelanggan?->nama }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Jenis Kelamin</label>
                                <select style="border: 1px solid #000000; padding: 10px" name="jenis_kelamin" id=""
                                    class="form-control @if ($errors->has('jenis_kelamin')) is-invalid @endif">
                                    <option selected disabled>*Pilih Jenis Kelamin</option>
                                    <option value="L" @if ($user->pelanggan?->jenis_kelamin == 'L') selected @endif>Laki - Laki
                                    </option>
                                    <option value="P" @if ($user->pelanggan?->jenis_kelamin == 'P') selected @endif>Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Nomor Telepon</label>
                                <input style="border: 1px solid #000000; padding: 10px"  name="no_telp" required="" type="tel"
                                    class="form-control @if ($errors->has('no_telp')) is-invalid @endif"
                                    value="{{ $user->pelanggan?->no_telp }}" placeholder="*Nomor Telephone">
                                @error('no_telp')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Email</label>
                                <input style="border: 1px solid #000000; padding: 10px"  name="email" required="" type="email"
                                    class="form-control @if ($errors->has('email')) is-invalid @endif"
                                    placeholder="*Email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Password</label>
                                <input style="border: 1px solid #000000; padding: 10px"  name="password" type="password"
                                    class="form-control @if ($errors->has('password')) is-invalid @endif"
                                    placeholder="*********">
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="col-12 mt-5 mb-2">
                                <button type="submit" class="btn-full-filled btn btn-primary w-100">Update Data</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#chage_image').click(function() {
                $('#image').click();
            });

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
