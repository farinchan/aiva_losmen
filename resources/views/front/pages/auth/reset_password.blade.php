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
                        <h2 class="text-capitalize thmv-title-effect">Update Password</h2>
                    </div>
                    <form class="row g-3 has-validation" action="{{ route("auth.reset-password.process", $token) }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <p>
                                Masukkan password baru anda.
                            </p>
                        </div>
                        <div class="col-md-12">
                            <input required="" type="password" class="form-control" name="password"
                                placeholder="*Password baru">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-full-filled btn btn-primary w-100">Update Password</button>
                        </div>
                        <p class="text-center">
                            Sudah punya akun? <a href="{{ route('auth.login') }}">Login Disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- getin touch section end -->
@endsection
