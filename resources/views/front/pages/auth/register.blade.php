@extends('front.app')

@section('content')
    <!-- getin touch section start -->
    <section class="thmv-get-in-touch thmv-contact-sec">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 thmv-contact-info">
                    <img src="{{ asset('front/images/contac-side-img.jpg') }}" alt="">
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-12 mx-auto thmv-contact-form my-5">
                    <div class="thmv-form-title">
                        <h2 class="text-capitalize thmv-title-effect">Register </h2>
                    </div>
                    <form class="row g-3 has-validation">
                        <div class="col-md-12">
                            <img src="{{ asset('front/images/image_placeholder.jpg') }}"
                                style="width: 200px; height: 200px; cursor: pointer;" class="img-thumbnail" id="image_placeholder">
                            <input type="file" name="foto" id="image" style="display: none;">
                            <p style="margin: 0; padding: 0">
                                <small style="margin: 0; padding: 0" >*Klik gambar untuk mengganti foto, Ratio 1:1, Max 2MB
                                </small>
                            </p>

                        </div>
                        <div class="col-md-12">
                            <input name="name" required="" type="text" class="form-control"
                                placeholder="*Nama Lengkap">
                        </div>
                        <div class="col-md-12">
                            <select style="border: 1px solid #000000;"
                             name="jenis_kelamin" id="" class="form-control">
                                <option selected disabled>*Pilih Jenis Kelamin</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <input name="no_telp" required="" type="tel" class="form-control"
                                placeholder="*Nomor Telephone">
                        </div>
                        <div class="col-md-12">
                            <input name="email" required="" type="email" class="form-control" placeholder="*Email">
                        </div>
                        <div class="col-md-12">
                            <input name="password" required="" type="password" class="form-control"
                                placeholder="*Password">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn-full-filled btn btn-primary w-100">Login</button>
                        </div>
                        <p class="text-center">
                            Sudah Punya akun? <a href="{{ route('auth.login') }}">Login Disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- getin touch section end -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#image_placeholder').click(function() {
                $('#image').click();
            });

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_placeholder').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
