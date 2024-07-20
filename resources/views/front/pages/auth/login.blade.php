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
                        <h2 class="text-capitalize thmv-title-effect">Login </h2>
                    </div>
                    <form class="row g-3 has-validation">
                        <div class="col-md-12">
                            <input required="" type="email" class="form-control" id="youremail"
                                placeholder="*Email">
                        </div>
                        <div class="col-md-12">
                            <input required="" type="password" class="form-control" id="yourpassword"
                                placeholder="*Password">
                        </div>
                        <div class="col-md-12 text-end">
                            <a href="">Lupa Password?</a>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn-full-filled btn btn-primary w-100">Login</button>
                        </div>
                        <p class="text-center">
                            Belum punya akun? <a href="{{ route('auth.register') }}">Register Disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- getin touch section end -->
@endsection
